<script>
    export let tbl_data;
</script>

<div>
    <table>
        <thead>
        <tr>
            {#each tbl_data[0] as th}
                <th>{th}</th>
            {/each}
        </tr>
    </thead>
    <tbody>
        {#each tbl_data as row, i}
            <tr>
                {#each row as c}
                    {#if i > 0}
                        <td>{c}</td> 
                    {/if}
                {/each}
            </tr>
            <!-- on:click={increment}-->
        {/each}
    </tbody>
    </table>
</div>

<style>
    

    thead{
        position: sticky;
        top: 0;
        background-color: black;
        color: white;
    }

    table 
    {
        width: 90%;
        margin: auto;
        height: 85vh;
        background-color: aliceblue;
       
    }

    table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

    td {
        text-align: center;
    }
</style>
