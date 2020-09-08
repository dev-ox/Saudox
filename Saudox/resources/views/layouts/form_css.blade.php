<style>
.caixa_form {
    background-color: #424242;
    color: white;
    background-color: 424242;
    border-style: solid;
    border-color: #FFCC33;
    text-align: center;
    width: 70%;
    margin: auto;
    margin-bottom: 20px;
}

.caixa_form input {
    background: none;
    display: block;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #FFCC33;
    padding: 14px 10px;
    width: 40%;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
}

.caixa_form input:focus {
    width: 55%;
}



.caixa_form input[type = "radio"], .caixa_form input[type = "checkbox"]{
    background: none;
    display: inline;
    margin: 20px auto;
    text-align: center;
    border: 2px solid #FFCC33;
    padding: 14px 10px;
    width: 5%;
    outline: none;
    color: white;
    border-radius: 24px;
    transition: 0.25s;
}

.caixa_form input[type = "submit"] {
    width: 30%;
    outline: none;
    color: white;
    border: 2px solid #5d8ca2;
    border-radius: 24px;
    transition: 0.25s;
    cursor: pointer;
}

.caixa_form input[type = "submit"]:hover {
    color: black;
    background-color: #FFCC33;
}


.hr_form {
    width: 70%;
}


.checkbox_container {
    text-align: left;
    margin-left: 43%;
}



/* Tirar as setinha de numero */
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}

</style>
