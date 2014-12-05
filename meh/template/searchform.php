<form method="get" id="search-box">
	Search
	<input type="text" name="pagina" value="searchpage" hidden="true">
	<input type="text" id="pollsearch" name="pollsearch" value="<?php echo $_GET['pollsearch']?>" placeholder="search for polls"
		onfocus="this.value = this.value;" autofocus="autofocus">
	<input type="submit" hidden="true">
</form>