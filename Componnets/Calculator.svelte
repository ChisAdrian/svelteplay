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
        else calcVal = "Failed:" + calcVal;
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

    let nums = [
        "0",
        "1",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "+",
        "-",
        "/",
        "*",
        ".",
    ];
    let doCalcs = ["Enter", "="];

    function onKeyDown(e) {
        if (nums.includes(e.key)) {
            calcVal += e.key;
        }

        if (doCalcs.includes(e.key)) {
            calculateEvalKey();
        }

        if (e.key == "Backspace") calcVal = calcVal.slice(0, -1);
        if (e.key == "Delete") calcVal = "";

        console.log(e.key);
    }

    import ButtonM from "./ButtonM.svelte";
</script>

<svelte:window on:keydown={onKeyDown} />

<div class="calculator">
    <div id="result">{calcVal}</div>
    <div class="row">
        <ButtonM action={clearRes} txt="C" />
        <ButtonM action={backSpacRes} txt="<<" />
        <ButtonM actas="dsb" />
        <ButtonM action={addToRes} actas="op" txt="/" />
    </div>
    <div class="row">
        {#each ["7", "8", "9", "*"] as btn, i}
            {#if i < 3}
                <ButtonM action={addToRes} txt={btn} />
            {:else}
                <ButtonM action={addToRes} actas="op" txt={btn} />
            {/if}
        {/each}
    </div>
    <div class="row">
        {#each ["4", "5", "6", "-"] as btn, i}
            {#if i < 3}
                <ButtonM action={addToRes} txt={btn} />
            {:else}
                <ButtonM action={addToRes} actas="op" txt={btn} />
            {/if}
        {/each}
    </div>
    <div class="row">
        {#each ["1", "2", "3", "+"] as btn, i}
            {#if i < 3}
                <ButtonM action={addToRes} txt={btn} />
            {:else}
                <ButtonM action={addToRes} actas="op" txt={btn} />
            {/if}
        {/each}
    </div>
    <div class="row">
        <ButtonM action={addToRes} txt="." />
        <ButtonM action={addToRes} txt="0" />
        <ButtonM actas="dsb" />
        <ButtonM action={calculateEval} actas="prime" txt="=" />
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
        background-color: #f5f5f5;
        padding: 10px;
        box-shadow: 3px 3px 3px #999;
    }

    .row {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 3%;
    }
</style>
