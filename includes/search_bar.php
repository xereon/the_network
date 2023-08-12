<form method="get" action="results.php" class="search-bar" style="display: none;">
    <input type="text" name="user_query" placeholder="Search..." />
    <input type="submit" name="search" value="Search">
</form>

<button id="toggleSearch">Show Search</button>

<style>
* {
  font-family: -moz-fixed;
}
	 .search {
			display: none;
			padding: 10px;
			margin-top: 10px;
			background-color: #f5f5f5;
			border: 1px solid #ddd;
			border-radius: 5px;
		}
	#toggleSearch.open {
        background-color: #dc3545;
    }
    #toggleSearch {
		margin: 0 auto;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 5px;
        margin-bottom: 10px;
        font-size: 16px;
        font-weight: bold;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s, box-shadow 0.3s;
		position: absolute;
		top:0px;
    }
	#toggleSearch:hover {
        background-color: #0056b3;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
</style>
<script>
$(document).ready(function() {
    $("#toggleSearch").click(function() {
        $(".search-bar").slideToggle(400, function() {
            $("#toggleSearch").text(function(i, text) {
                return text === "Show Search Bar" ? "Close Search" : "Open Search";
            });
        });
    });
});
</script>

