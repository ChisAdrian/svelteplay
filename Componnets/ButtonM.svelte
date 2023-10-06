<script>
	// logic goes here
    const dummy = null;
    export let action = dummy;
    export let txt = "";
    export let actas = "b";

    

</script>

<!-- markup (zero or more items) goes here -->
<button class={actas} on:click={action}>{txt}</button>

<style>

   
    button:not(.dsb)
    {
	/* styles go here */
   
        width: calc(25% - 8px);
        min-width: 44px;
        height: 44px;
        font-size: 24px;
        border: none;
        border-radius: 8px;
        background-color: #fff;
        box-shadow:  3px 3px 3px  #999;
    }

    button.op{
        background-color: #c6cd47;
    }

    button.prime{
        background-color: #121958;
        color: white;
    }

    button:hover{
        background-color: #a8a4a4;
    }


    button.dsb{
        background-color: transparent;
        border: none;
        width: calc(25% - 5px);
      height: 44px;   
        min-width: 44px;
    }
</style>
