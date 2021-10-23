<nav class="navbar navbar-expand-lg navbar-dark my-bg-element">
  <div class="container">
    <a class="navbar-brand" href="/">Laravel App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "Home") ? "active" : "" }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "About") ? "active" : "" }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "Posts") ? "active" : "" }}" href="/posts">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "Users") ? "active" : "" }}" href="/users">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($tittle === "Categories") ? "active" : "" }}" href="/posts/categories">Categories</a>
        </li>
      </ul>
    </div>
  </div>
</nav>