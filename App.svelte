
<script>
	import DataTbl from './DataTbl.svelte';
	export const router = null;
	let fontSize = 16;
	
	let tData = [['*']]

  const getPhpResponce = async () => 
  {
    const response = await fetch('mimic_php_responce.php'
		, {
		method: 'POST',
		headers: {
			"Content-Type": "application/json"
			},
		body: JSON.stringify({ username: "UN" , pass :"PCXPD" })
		}
		
	);
  
	const json = await response.json();

	tData = json;
  }

</script>

<main>
	<button on:click={getPhpResponce}>GetPHP</button>
	<button on:click={e => fontSize--}>-</button>
	
		<div style="font-size: {fontSize + 'px'}">
			<div id="tbl_data_parent">
				<DataTbl  tbl_data= {tData} />
			</div>
		</div>
	

</main>

<style>

	#tbl_data_parent
	{
		height: 84vh;
		overflow: auto;
		/*border-radius: 5%;
		border-color: rgb(87, 79, 79);
		border-style: solid;
		*/
	}

	main {
		background-color: white;
		height: 100%;
	}

	button{
		border-radius: 10%;
		background-color: lightslategray;
		color: whitesmoke;
		border-width: 3px;
	}


	button:hover{
		background-color: rgb(5, 25, 44);
	}
</style>
