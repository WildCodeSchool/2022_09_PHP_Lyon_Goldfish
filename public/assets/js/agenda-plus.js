function toggle() {
    let visibleArray = (document).getElementsByClassName("visible");
    for (let i = 0; i < visibleArray.length; i++)
        visibleArray.item(i).classList.toggle('d-none');
}
