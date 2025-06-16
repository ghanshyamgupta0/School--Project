window.addEventListener('scroll', () => {
    const sections = document.querySelectorAll('section');
    const navLinks = document.querySelectorAll('nav a');
  
    let current = '';
  
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 100;
      if (pageYOffset >= sectionTop) {
        current = section.getAttribute('id');
      }
    });
  
    navLinks.forEach(link => {
      link.classList.remove('active');
      if (link.getAttribute('href') === `#${current}`) {
        link.classList.add('active');
      }
    });
  });

  const sections = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll("nav a");
  
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      const id = entry.target.getAttribute("id");
      const link = document.querySelector(`nav a[href="#${id}"]`);
  
      if (entry.isIntersecting) {
        navLinks.forEach(link => link.classList.remove("active"));
        link.classList.add("active");
      }
    });
  }, {
    threshold: 0.6
  });
  
  sections.forEach(section => observer.observe(section));
  

document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');
    const navLinks = document.querySelectorAll('.nav-link');

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        const isClickInsideNavbar = navbarCollapse.contains(event.target);
        const isClickOnToggler = navbarToggler.contains(event.target);

        if (!isClickInsideNavbar && !isClickOnToggler && navbarCollapse.classList.contains('show')) {
            navbarCollapse.classList.remove('show');
        }
    });

    // Close menu when clicking on a nav link
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navbarCollapse.classList.contains('show')) {
                navbarCollapse.classList.remove('show');
            }
        });
    });

    // Prevent clicks inside navbar from closing it
    navbarCollapse.addEventListener('click', function(event) {
        event.stopPropagation();
    });
});

// Language Switching
document.addEventListener('DOMContentLoaded', function() {
    const languageLinks = document.querySelectorAll('.language-switch a');
    
    languageLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            languageLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            // Here you would typically implement the actual language switching logic
        });
    });

    // Login Form Handling
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('loginEmail').value;
            const password = document.getElementById('loginPassword').value;
            
            // Here you would typically make an API call to your backend
            console.log('Login attempt:', { email, password });
            
            // For demo purposes, show success message
            alert('Login successful!');
            bootstrap.Modal.getInstance(document.getElementById('loginModal')).hide();
        });
    }

    // Signup Form Handling
    const signupForm = document.getElementById('signupForm');
    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const name = document.getElementById('signupName').value;
            const email = document.getElementById('signupEmail').value;
            const password = document.getElementById('signupPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (password !== confirmPassword) {
                alert('Passwords do not match!');
                return;
            }

            // Here you would typically make an API call to your backend
            console.log('Signup attempt:', { name, email, password });
            
            // For demo purposes, show success message
            alert('Signup successful!');
            bootstrap.Modal.getInstance(document.getElementById('signupModal')).hide();
        });
    }
}); 