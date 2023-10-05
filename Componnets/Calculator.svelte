<script>
    let calcVal = "";

    const clearRes = () => {
        calcVal = "";
    };

    const backSpacRes = () => {
        calcVal = calcVal.slice(0, -1);
    };

    const calculateEval = () => {
        let n = alt_eval().toString();

        if (!isNaN(parseFloat(n)) && isFinite(alt_eval()))
            calcVal = alt_eval().toString();
        else alert("Failed Calculation for expr:\n" + calcVal);
    };

    function calculateEvalKey() {
        let n = alt_eval().toString();

        if (!isNaN(parseFloat(n)) && isFinite(alt_eval()))
            calcVal = alt_eval().toString();
        else alert("Failed Calculation for expr:\n" + calcVal);
    }

    const addToRes = (el) => {
        calcVal += el.target.innerText;
    };

    function alt_eval() {
        const inputString = calcVal.trim();

        if (inputString === "0") {
            return 0;
        }

        const operators = inputString.replace(/[0-9.]/g, "").split("");
        const numbers = inputString.split(/[+\-*/]/).map(parseFloat);

        const performOperation = (op) => {
            let operatorIndex = operators.indexOf(op);
            while (operatorIndex !== -1) {
                if (op === "/") {
                    numbers.splice(
                        operatorIndex,
                        2,
                        numbers[operatorIndex] / numbers[operatorIndex + 1]
                    );
                } else if (op === "*") {
                    numbers.splice(
                        operatorIndex,
                        2,
                        numbers[operatorIndex] * numbers[operatorIndex + 1]
                    );
                } else if (op === "-") {
                    numbers.splice(
                        operatorIndex,
                        2,
                        numbers[operatorIndex] - numbers[operatorIndex + 1]
                    );
                } else if (op === "+") {
                    numbers.splice(
                        operatorIndex,
                        2,
                        numbers[operatorIndex] + numbers[operatorIndex + 1]
                    );
                }
                operators.splice(operatorIndex, 1);
                operatorIndex = operators.indexOf(op);
            }
        };

        performOperation("/");
        performOperation("*");
        performOperation("-");
        performOperation("+");

        return numbers[0];
    }

    let push = "";
    function onKeyDown(e) {
        switch (e.keyCode) {
            case 8:
                calcVal = calcVal.slice(0, -1);
                break;

            case 13:
                calculateEvalKey();
                break;
            case 187:
                calculateEvalKey();
                break;
            case 46:
                calcVal = "";
                break;
            case 110:
                calcVal += ".";
                break;
            case 111:
                calcVal += "/";
                break;
            case 106:
                calcVal += "*";
                break;
            case 109:
                calcVal += "-";
                break;
            case 107:
                calcVal += "+";
                break;
            case 96:
                calcVal += "0";
                break;
            case 97:
                calcVal += "1";
                break;
            case 98:
                calcVal += "2";
                break;
            case 99:
                calcVal += "3";
                break;
            case 100:
                calcVal += "4";
                break;
            case 101:
                calcVal += "5";
                break;
            case 102:
                calcVal += "6";
                break;
            case 103:
                calcVal += "7";
                break;
            case 104:
                calcVal += "8";
                break;
            case 105:
                calcVal += "9";
                break;
            /*
                case  189 : calcVal +='-'   ; break;
                case  56 : calcVal +='*'   ; break;
                case  191 : calcVal +='/'  ; break;
                case  190 : calcVal +='.'  ; break;
                case  48 :  calcVal +='0'  ; break;
                case  49 :  calcVal +='1'  ; break;
                case  50 :  calcVal +='2'  ; break;
                case  51 :  calcVal +='3'  ; break;
                case  52 :  calcVal +='4'  ; break;
                case  53 :  calcVal +='5'  ; break;
                case  54 :  calcVal +='6'  ; break;
                case  55 :  calcVal +='7'  ; break;
                case  56 :  calcVal +='8'  ; break;
                case  57 :  calcVal +='9'  ; break;
            */

            default:
                push = "";
                break;
        }

        console.log(e.keyCode + "?" + push);
    }
</script>

<svelte:window on:keydown|preventDefault={onKeyDown} />

<div class="calculator">
    <div id="result">{calcVal}</div>
    <div class="row">
        <button on:click={clearRes}>C</button>
        <button on:click={backSpacRes}>←</button>
        <button class="button_disabled" disabled />
        <button class="oper" on:click={addToRes}>/</button>
    </div>
    <div class="row">
        {#each ["7", "8", "9", "*"] as btn, i}
            {#if i < 3}
                <button on:click={addToRes}>{btn}</button>
            {:else}
                <button class="oper" on:click={addToRes}>{btn}</button>
            {/if}
        {/each}
    </div>
    <div class="row">
        {#each ["4", "5", "6", "-"] as btn, i}
            {#if i < 3}
                <button on:click={addToRes}>{btn}</button>
            {:else}
                <button class="oper" on:click={addToRes}>{btn}</button>
            {/if}
        {/each}
    </div>
    <div class="row">
        {#each ["1", "2", "3", "+"] as btn, i}
            {#if i < 3}
                <button on:click={addToRes}>{btn}</button>
            {:else}
                <button class="oper" on:click={addToRes}>{btn}</button>
            {/if}
        {/each}
    </div>
    <div class="row">
        <button on:click={addToRes}>.</button>
        <button on:click={addToRes}>0</button>
        <button class="button_disabled" disabled />
        <button class="backspace" on:click={calculateEval}>=</button>
    </div>
</div>

<style>
    /* Add your styles here if needed */

    .calculator {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 20px;
        font-size: 24px;
        max-width: 550px;
    }

    #result {
        width: 95%;
        height: 40px;
        font-size: 36px;
        text-align: left;

        margin: auto;

        margin-bottom: 20px;
        /*border: none;*/
        background-color: #f5f5f5;
        padding: 10px;
    }

    .row {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 10px;
    }

    button {
        width: calc(25% - 5px);
        height: 60px;
        font-size: 24px;
        border: none;
        border-radius: 5px;
        background-color: #fff;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
    }

    button.oper {
        background-color: #c6cd47;
    }

    .button_disabled {
        background-color: transparent;
    }

    button.backspace {
        background-color: #f0ad4e;
        color: #fff;
    }
</style>
