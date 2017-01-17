function login() {
    var elem = document.getElementsByName('login');

    elem.style.background = 'red';

    alert( elem == content ); // true

    content.style.background = "";
}
