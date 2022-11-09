switch (!0) {
    case /artists/.test(window.location.pathname):
        document.getElementById("artists-desktop-text").classList.add("active");
        document.getElementById("artists-desktop-img").classList.add("active");
        document.getElementById("artists-mobile-text").classList.add("active");
        document.getElementById("artists-mobile-img").classList.add("active");
        break;
    case /concerts/.test(window.location.pathname):
        document.getElementById("concerts-desktop-text").classList.add("active");
        document.getElementById("concerts-desktop-img").classList.add("active");
        document.getElementById("concerts-mobile-text").classList.add("active");
        document.getElementById("concerts-mobile-img").classList.add("active");
        break;
    case /venues/.test(window.location.pathname):
        document.getElementById("venues-text").classList.add("active");
        document.getElementById("venues-img").classList.add("active");
        break;
    default:
        document.getElementById("home-desktop-text").classList.add("active");
        document.getElementById("home-desktop-img").classList.add("active");
        document.getElementById("home-mobile-text").classList.add("active");
        document.getElementById("home-mobile-img").classList.add("active");
}