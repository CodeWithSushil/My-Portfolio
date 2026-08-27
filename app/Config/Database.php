
<?php
declare(strict_types=1);

namespace App\Config;

class Database
{
  public function __construct(
    private string $driver,
    private string $host,
    private int $port,
    private string $dbname,
    private string $charset,
    private string $username,
    private string $password
  ) {
    $this->driver = getenv('DRIVER') ? $_ENV['DRIVER'] : 'mysql';
    $this->host = getenv('HOST') ? $_ENV['HOST'] : '127.0.0.1';
    $this->dbname = getenv('DB_NAME') ? $_ENV['BD_NAME'] : 'MyApp';
    $this->port = getenv('PORT') ? $_ENV['PORT'] : 3306;
    $this->charset = getenv('CHARSET') ? $_ENV['CHARSET'] : 'utf8mb4';
    $this->username = getenv('USERNAME') ? $_ENV['USERNAME'] : 'root';
    $this->host = getenv('PASSWORD') ? $_ENV['PASSWORD'] : '';
  }

  public function getConnection(): void {
    $dns = "$this->driver:host=$this->host;port=$this->port;dbname=$this->dbname;charset=$this->charset;";

    $optinal = [
      'PDO::ATTR_ERRMODE' => 'PDO::ERRMODE_EXCEPTION',
      'PDO::ATTR_DEFAULT_FETCH_MODE' =>'PDO::FETCH_ASSOC',
      'PDO::ATTR_EMULATE_PREPARES' => false

    ];

    $pdo = new PDO($dns, $this->username, $this->password, $optinal);
  }
}
