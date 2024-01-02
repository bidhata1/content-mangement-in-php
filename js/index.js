function toggleMenu() {
    var navList = document.querySelector('nav ul');
    navList.classList.toggle('show');
  }
  function toggleSubMenu(subMenuId) {
    const subMenu = document.getElementById(subMenuId);
    subMenu.classList.toggle('show-submenu');
  }