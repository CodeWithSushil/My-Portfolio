<section id="contact" class="portfolio-section">
  <div class="container">
    
    <div class="section-heading">
      <h2 class="title is-2">
        Contact Me
      </h2>
      <p class="subtitle">
        Have a project, website issue or idea?
        Let's discuss it.
      </p>
    </div>

    <div class="contact-box">
      <form action="/contact" method="post">
        <div class="columns is-multiline">
          <!-- Name -->
          <div class="column is-6">
            <div class="field">
              <label class="label" for="name">
                Name
              </label>
              <div class="control has-icons-left">
                <input id="name" name="name" class="input" type="text" placeholder="Your name" required />
                <span class="icon is-small is-left">
                  <i class="fa-solid fa-user"></i>
                </span>
              </div>
            </div>
          </div>

          <!-- Email -->
          <div class="column is-6">
            <div class="field">
              <label class="label" for="email">
                Email
              </label>
              <div class="control has-icons-left">
                <input id="email" name="email" class="input" type="email" placeholder="you@example.com" required />
                <span class="icon is-small is-left">
                  <i class="fa-solid fa-envelope"></i>
                </span>
              </div>
            </div>
          </div>
        
          <!-- Subject -->
          <div class="column is-12">
            <div class="field">
              <label class="label" for="subject">
                Subject
              </label>
              <div class="control">
                <input id="subject" name="subject" class="input" type="text" placeholder="How can I help?" required />
              </div>
            </div>
          </div>
        
          <!-- Message -->
          <div class="column is-12">
            <div class="field">
              <label class="label" for="message">
                Message
              </label>
              <div class="control">
                <textarea id="message" name="message" class="textarea" rows="5" placeholder="Tell me about your project..." required></textarea>
              </div>
            </div>
          </div>

          <!-- Submit -->
          <div class="column is-12">
            <button type="submit" class="button is-primary is-medium">
              <span class="icon">
                <i class="fa-solid fa-paper-plane"></i>
              </span>
              <span>
                Send Message
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
