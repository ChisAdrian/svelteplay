<script>
	import DataTbl from './DataTbl.svelte';
  
	export const router = null;
  
	let fontSize = 16;
	let tbl_data_cols = [['*']];
	let tbl_data_rows = [['*']];
  
	const getPhpResponse = async () => {
	  const response = await fetch('mimic_php_responce.php', {
		method: 'POST',
		headers: {
		  'Content-Type': 'application/json'
		},
		body: JSON.stringify({ username: 'UN', pass: 'PCXPD' })
	  });
  
	  const [columns, rows] = await response.json();
  
	  tbl_data_cols = columns;
	  tbl_data_rows = rows;
	};
  </script>
  
  <main>
	<button on:click={getPhpResponse}>GetPHP</button>
	<button on:click={() => (fontSize -= 1)}>-</button>
  
	<div style="font-size: {fontSize}px">
	  <div id="tbl_data_parent">
		<DataTbl bind:tbl_data_cols={tbl_data_cols} bind:tbl_data_rows={tbl_data_rows} />
	  </div>
	</div>
  </main>
  
  <style>
	#tbl_data_parent {
	  height: 84vh;
	  overflow: auto;
	}
  
	main {
	  background-color: white;
	  height: 100%;
	}
  
	button {
	  border-radius: 10%;
	  background-color: lightslategray;
	  color: whitesmoke;
	  border-width: 3px;
	}
  
	button:hover {
	  background-color: rgb(5, 25, 44);
	}
  </style>
  
