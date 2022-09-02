const phoneInput = document.getElementById("phone");
const progressPercent = document.getElementById("quiz_form_progress_percent");
const progressLine = document.getElementById("quiz_form_progress_line");
const input = document.getElementsByClassName("quiz_form_select");
let numberOfResponses = 0;
let inputValues = [];
for (let i = 0; i < input.length; i++) {
    inputValues.push(input[i].value);
}

for (let i = 0; i < input.length; i++) {
    input[i].oninput = function() {
        if (input[i].value != '' && input[i].value != 'Не выбрано') {
            if (inputValues[i] == '' || inputValues[i] == 'Не выбрано') {
                numberOfResponses++;
            }
        } else {
            numberOfResponses--;
        }
        switch (numberOfResponses) {
            case 0:
                progressPercent.innerHTML = "5%";
                progressLine.style.width = "5%";
                break;
            case 1:
                progressPercent.innerHTML = "15%";
                progressLine.style.width = "15%";
                break;
            case 2:
                progressPercent.innerHTML = "27%";
                progressLine.style.width = "27%";
                break;
            case 3:
                progressPercent.innerHTML = "37%";
                progressLine.style.width = "37%";
                break;
            case 4:
                progressPercent.innerHTML = "51%";
                progressLine.style.width = "51%";
                break;
            case 5:
                progressPercent.innerHTML = "66%";
                progressLine.style.width = "66%";
                break;
            case 6:
                progressPercent.innerHTML = "81%";
                progressLine.style.width = "81%";
                break;
        }
        inputValues[i] = input[i].value;
    }
}

const phoneMaskSelect = document.getElementById("phoneMask");
const phoneMaskOption = document.getElementsByClassName("phoneMask_option");
const phoneMaskOptionInput = document.getElementsByClassName("phoneMask_option_input");
const phoneMaskOptionFlagInput = document.getElementsByClassName("phoneMask_option_input_flag");
const phoneFlagBlock = document.getElementById("quiz_form_select_phone_flag_block");
const phoneFlag = document.getElementById("quiz_form_select_phone_flag");
let phoneMaskCondition = false;
function phoneFlagBlockClose() {
    phoneMaskSelect.style.display = "none";
    phoneMaskCondition = false;
}

function phoneFlagBlockOpen() {
    phoneMaskSelect.style.display = "block";
    phoneMaskCondition = true;
}

Inputmask({
    "mask": phoneMaskOptionInput[0].value,
    showMaskOnHover: true
}).mask(phoneInput)

phoneFlagBlock.onclick = function() {
    if (phoneMaskCondition)
        phoneFlagBlockClose();
    else
        phoneFlagBlockOpen();
}

for (let i = 0; i < phoneMaskOption.length; i++) {
    phoneMaskOption[i].onclick = function() {
        let phoneMaskValue = phoneMaskOptionInput[i].value;
        phoneMaskValue = phoneMaskValue.replaceAll('9', '\\9');
        Inputmask({
            "mask": phoneMaskValue,
            showMaskOnHover: true
        }).mask(phoneInput)
        phoneInput.placeholder = phoneMaskOptionInput[i].value;
        phoneFlag.src = "img/flags/" + phoneMaskOptionFlagInput[i].value + ".svg";
        phoneFlagBlockClose();
    }
}