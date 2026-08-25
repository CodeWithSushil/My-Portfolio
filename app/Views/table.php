<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>SQL.js Pagination</title>
    </head>
    <body>
        <select id="tables"></select>

        <table border="1" cellpadding="5">
            <thead id="thead"></thead>
            <tbody id="tbody"></tbody>
        </table>

        <br />

        <button id="prev">Previous</button>
        <span id="page">1</span>
        <button id="next">Next</button>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.13.0/sql-wasm.js"></script>
        <script>
            let db;
            let currentTable = "";
            let page = 1;
            const limit = 10;

            async function loadDatabase() {
                const SQL = await initSqlJs({
                    locateFile: (file) =>
                        `https://cdnjs.cloudflare.com/ajax/libs/sql.js/1.13.0/${file}`,
                });

                const response = await fetch("app.sqlite");
                const buffer = await response.arrayBuffer();

                db = new SQL.Database(new Uint8Array(buffer));

                loadTables();
            }

            function loadTables() {
                const result = db.exec(`
        SELECT name
        FROM sqlite_master
        WHERE type='table'
        AND name NOT LIKE 'sqlite_%'
        ORDER BY name
    `);

                const select = document.getElementById("tables");

                result[0].values.forEach((row) => {
                    const option = document.createElement("option");
                    option.value = row[0];
                    option.textContent = row[0];

                    select.appendChild(option);
                });

                currentTable = select.value;

                renderTable();

                select.onchange = () => {
                    currentTable = select.value;
                    page = 1;
                    renderTable();
                };
            }

            function renderTable() {
                const offset = (page - 1) * limit;

                const count = db.exec(`SELECT COUNT(*) FROM "${currentTable}"`);

                const total = count[0].values[0][0];

                const rows = db.exec(
                    `SELECT * FROM "${currentTable}" LIMIT ${limit} OFFSET ${offset}`,
                );

                if (!rows.length) return;

                const columns = rows[0].columns;
                const values = rows[0].values;

                const thead = document.getElementById("thead");
                const tbody = document.getElementById("tbody");

                thead.innerHTML =
                    "<tr>" +
                    columns.map((c) => `<th>${c}</th>`).join("") +
                    "</tr>";

                tbody.innerHTML = values
                    .map(
                        (row) =>
                            "<tr>" +
                            row.map((v) => `<td>${v}</td>`).join("") +
                            "</tr>",
                    )
                    .join("");

                document.getElementById("page").textContent =
                    `${page} / ${Math.ceil(total / limit)}`;
            }

            document.getElementById("next").onclick = () => {
                page++;
                renderTable();
            };

            document.getElementById("prev").onclick = () => {
                if (page > 1) {
                    page--;
                    renderTable();
                }
            };

            loadDatabase();
        </script>
    </body>
</html>

