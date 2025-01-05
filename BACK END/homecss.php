body {
    font-family: Arial, sans-serif;
    padding: 2vw; 
    line-height: 1.6;
    background-image: url('/images/back-ground.jpg'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    backdrop-filter: blur(1px);
}

header {
    display: flex;
    align-items: center;
    flex-direction: row;
    background-color:#797972;
    border-radius: 30px;
    padding-block: 5px;
    opacity: 0.9;
    justify-content: space-between;
}
header .logo img {
    max-width: 55px;
    margin-left: 18px;
}
.nav-toggle {
    display: none; 
    background: none;
    border: none;
    cursor: pointer;
    margin-left: auto; 
    z-index: 20;
    font-size: 1.5rem;
}
nav ul {
    display: flex;
    list-style: none;
    flex-wrap: wrap;
}

nav ul li {
    margin-left: 2vw; 
    padding-inline: 20px;
}

nav ul li a {
    text-decoration: none;
}
  .nav-link {
    font-weight: bold;
    font-size: 18px;
    text-transform:uppercase;
    font-family: 'Poppins', sans-serif; /* Ensure the Poppins font is applied */
	font-weight: bold;
    text-decoration: none;
    color:white;
    padding: 10px 0px;
    margin: 0px 20px;
    position: relative;
    opacity: 0.75;
  }
  
  .nav-link:hover {
    opacity: 1;
  }
  
  .nav-link::before {
    transition: 700ms;
    height: 5px;
    content: "";
    position: absolute;
    background-color:black;
  }
  
  .nav-link-ltr::before {
    width: 0%;
    bottom:5px;
  }
  
  .nav-link-ltr:hover::before {
    width: 100%;
  }
  
main {
    margin-top: 2vw;
    background-color: rgba(24, 23, 23, 0.9);
    box-shadow: 0px 0px 40px rgba(58, 58, 60, 0.37);
    padding: 3vw;
    border-radius: 10px;
    line-height: 40px;
    color: white;
    opacity: 0.9;
}

h1 {
    text-align: center;
    margin-bottom: 1.5vw;
    font-family: 'Poppins', sans-serif; /* Ensure the Poppins font is applied */
	font-weight: bold;
    font-optical-sizing: auto;
    font-style: normal;
    font-size: 3rem;
    font-weight: 500;
}

p {
    word-spacing: 3px;
    font-family: 'Poppins', sans-serif; /* Ensure the Poppins font is applied */
			font-weight: bold;
    font-style: normal;
    font-size: 1.5rem;
}

@media (max-width: 1180px) {
    .nav-toggle {
        display: block; 
        padding-inline: 0px 20px;
    }
    nav ul {
        display: none;
        flex-direction: column;
        background-color: black;
        position: absolute; 
        top: 60px;
        right:0;
        gap: 20px;
        text-align: center;
        padding: 20px 0;
        border-radius: 10px;
        z-index: 15; 
    }
    header {
        opacity: 1;
    }
    .nav-menu.nav-menu-visible {
        display: flex;
        z-index: 15;
    }

    h1 {
        font-size: 1.5rem;
    }

    p {
        font-size: 1.3rem;
    }

}
