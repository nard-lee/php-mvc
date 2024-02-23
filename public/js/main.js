let signupForm = document.querySelector(".signup-form");
signupForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    
    let formData = new URLSearchParams(new FormData(e.target)).toString();

    fetch('/signup', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: formData
    }).then(response => response.text()) 
      .then(data => console.log(data))
      .catch(error => console.error(error));
});

