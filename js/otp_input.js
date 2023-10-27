    document.addEventListener("input", function (e) {
        if (e.target.classList.contains("otp-input")) {
            var maxLength = parseInt(e.target.getAttribute("maxlength"), 10);
            if (e.target.value.length === maxLength) {
                var nextInput = e.target.nextElementSibling;
                if (nextInput) {
                    nextInput.focus();
                }
            }
        }
    });

    document.addEventListener("paste", function (e) {
        var clipboardData = e.clipboardData || window.clipboardData;
        var pastedData = clipboardData.getData("text");
        var otpInputs = document.querySelectorAll(".otp-input");

        if (pastedData.length === otpInputs.length) {
            for (var i = 0; i < otpInputs.length; i++) {
                otpInputs[i].value = pastedData[i];
            }
            var lastInput = otpInputs[otpInputs.length - 1];
            lastInput.focus();
        }
    });

    document.addEventListener("keyup", function (e) {
        if (e.key === "Backspace" && e.target.classList.contains("otp-input")) {
            var previousInput = e.target.previousElementSibling;
            if (previousInput) {
                previousInput.focus();
                previousInput.value = '';
            }
        }
    });