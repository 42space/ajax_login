this.formLogin.addEventListener("submit", async (e) => {
    e.preventDefault();
    
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    if (isNullBlankEmpty(username.value)) {
        alert("Please enter a username");
        return;
    }

    if (isNullBlankEmpty(password.value)) {
        alert('Please enter a password');
        return;
    }

    let data = new FormData(this.formLogin);
    let request = await fetch("valida.php", {
        method: 'POST',
        body: data
    });

    let response = await request.json();
    
    if (response.erro) {
        alert('Try again');
        return;
    }
    
    //login success
    //can receive a token from the backend to redirect the pro app
})

function isNullBlankEmpty(str)
{
    return str === "" || str.match(/^ *$/) != null || str.match(/^\s+$/); 
}