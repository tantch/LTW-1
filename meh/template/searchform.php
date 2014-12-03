<div>
	<h1>Search</h1>
    <script  type="text/javascript" src="JS/search.js"></script>
	<form id="searchForm" method="get">
		<input type="text" name="pagina" value="searchpage" hidden="true">
		<input type="text" id="pollsearch" name="pollsearch" value="<?php echo $_GET['pollsearch']?>" placeholder="search for polls" onfocus="this.value = this.value;"
			autofocus="autofocus">
		<input type="submit" hidden="true">
	</form>
</div>
