<form action="/" method="get">
  <label for="search">Search</label>
  <input name="s" id="search" value="<?php the_search_query(); ?>" required/>
  <button type="submit">Search!</button>
</form>