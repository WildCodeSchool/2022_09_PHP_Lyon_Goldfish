//function toggle() {
//    var nodes = document.querySelectorAll(".test"),
//        node,
//        styleProperty = function (a, b) {
//            return window.getComputedStyle ? window.getComputedStyle(a).getPropertyValue(b) : a.currentStyle[b];
//        };
//
//    [].forEach.call(nodes, function (a, b) {
//        node = a;
//
//        node.style.display = styleProperty(node, 'display') === 'block' ? 'none' : 'block';
//    });

//}
function toggle() {
    var testarray = (document).getElementsByClassName("test");
    for (var i = 0; i < testarray.length; i++)
        testarray.item(i).className += " d-none";
}



