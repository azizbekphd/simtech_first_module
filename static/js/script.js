document.querySelectorAll("input[type=file]").forEach((item)=>{
    const label = item.parentElement.querySelector("input ~ label");
    const defaultText = label.innerHTML;
    item.onchange = () => {
        label.innerHTML = item.files.length > 0 ? item.files[0].name : defaultText;
    }
})
