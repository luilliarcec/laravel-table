<script>
    function dropdown(event, dropdownId, placement = 'bottom-start') {
        let element = event.target;

        while (element.nodeName !== "BUTTON") {
            element = element.parentNode;
        }

        let popper = Popper.createPopper(element, document.getElementById(dropdownId), {
            placement: placement
        });

        document.getElementById(dropdownId).classList.toggle("hidden");
        document.getElementById(dropdownId).classList.toggle("block");
    }
</script>
