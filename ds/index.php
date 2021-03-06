<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>
    NOI Reference
</title>

<!-- Bootstrap core CSS -->
<link href="/css/bootstrap.min.css" rel="stylesheet">

<!-- Documentation extras -->
<link href="/css/docs.min.css" rel="stylesheet">
<link href="/css/prettify.css" rel="stylesheet">
<link href="/css/app.css" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->



  </head>
  <body>
    <a class="sr-only" href="#content">Skip to main content</a>

    <!-- Docs master nav -->
    <header class="navbar navbar-static-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand">NOI Reference</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">
        <li>
          <a href="/misc/">Misc.</a>
        </li>
        <li>
          <a href="/math/">Math</a>
        </li>
        <li>
          <a href="/dp/">Dynamic Programming</a>
        </li>
        <li>
          <a href="/graph/">Graph</a>
        </li>
        <li class="active">
          <a href="/ds/">Data Structure</a>
        </li>
      </ul>
    </nav>
  </div>
</header>


    <!-- Docs page layout -->
    <div class="bs-header" id="content">
      <div class="container">
        <h1>Data Structures</h1>
        <p>Custom Data Structures</p>
        
      </div>
    </div>

    <div class="container bs-docs-container">

      <div class="row">
        <div class="col-md-9" role="main">
<!-- Union Find Disjoint Set ================================================== -->
<div class="bs-docs-section">
  <h1 id="ufds" class="page-header">Union Find Disjoint Set</h1>
  <h3 id="ufds-compress">Path Compression</h3>
  <p>Union Find Disjoint Set with path compression only.</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/ufds.cpp")); ?></pre>
  
  <h3 id="ufds-rank">Union by Rank</h3>
  <p>This implementation 'ranks' using size of group and will still guarantee a maximum tree height of log N by always merging a smaller group into a larger group. (Proof using Heavy Light Decomposition)</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/ufdsrank.cpp")); ?></pre>

</div>
<!-- Fenwick Tree ================================================== -->
<div class="bs-docs-section">
  <h1 id="fw" class="page-header">Fenwick Tree</h1>
  <h3 id="fw-normal">Normal Fenwick</h3>
  <p>Point update, range sum query</p>
  <p>Range update, point query (Store the 'deltas')</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/fw.cpp")); ?></pre>
  
  <h3 id="fw-range">Range Update Range Query</h3>
  <p>Using 2 fenwicks to simulate range update range query in log N</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/fwrange.cpp")); ?></pre>

  <h3 id="fw-rmq">Range Min/Max Query</h3>
  <p>Fenwicks can be used to solve Range Min/Max Query only of the queries are in the form: What is the min/max of the array from index <b>1</b> to <b>X</b>? Furthermore, updates can only be incrementing for Range Maximum Query, meaning that you cannot update node 2 with value 7 and then update it with value 5 again. For Range Minimum Query, updates must be decrementing, meaning that you cannot update node 2 with value 6 and then update it with value 8 again.</p>
  <p>With those conditions satisfied, simple changes to the normal fenwick code is required to make fenwick work for Range Min/Max Query</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/fwrmq.cpp")); ?></pre>
  
  <h3 id="fw-2d">2D Fenwick</h3>
  <p>Point update in 2D space, range sum in 2D space</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/fw2d.cpp")); ?></pre>
</div>
<!-- Segment Tree ================================================== -->
<div class="bs-docs-section">
  <h1 id="seg" class="page-header">Segment Tree</h1>
  <h3 id="seg-all">All-in-One Segment Tree</h3>
  <p>Range min/max/sum query</p>
  <p>Range add/set</p>
  <p>Note that <code>s</code> and <code>e</code> are inclusive and the segment tree does not implement lazy update (<code>set</code> and <code>add</code> functions are O(N))
  <p><b>Code from Hubert's NOI Reference</b></p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/seg_all.cpp")); ?></pre>
  <h3 id="seg-lazypropagation">Lazy Propagation</h3>
  <p>Supports fast range add and query by lazy propagating the changes.</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/seg_lazypropagation.cpp")); ?></pre>

  <h3 id="seg-lazynode">Lazy Node Creation</h3>
  <p>Supports aribitary large ranges by creating segment tree nodes lazily (defaults to 0).</p>
  <p>The below code has lazy propagation as well so range add is O(log R), where R is the size of the range (negligible)</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/seg_lazynode.cpp")); ?></pre>
  
  <h3 id="seg-2d">2D Segment Tree</h3>
  <p>The below is the code for IOI 2013 Game (GCD) which obtains full score.</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/ioigame.cpp")); ?></pre>
  
  
</div>
<!-- Heavy Light Decomposition ================================================== -->
<div class="bs-docs-section">
  <h1 id="decomp" class="page-header">Heavy Light Decomposition</h1>
  <p><code>par[x]</code> stores the parent of node x. The root is -1. (This code assumes that the tree is all connected)</p>
  <p><code>num_child[x]</code> stores the number of children the node's subtree has (including itself)</p>
  <p><code>height[x]</code> stores the height of (or distance to) node x from the root.</p>
  <p>The code will split the tree into multiple linear paths or segments. <code>segcount</code> contains the number of linear paths. These linear paths are labelled from 1 to <code>segcount</code> and <code>segitem[s]</code> contains the list of nodes in the linear path labelled <code>s</code>, ordered in increasing height from root.</p>
  <p><code>segroot[s]</code> stores the parent of the first node in <code>segitem[s]</code>, this is essentially where the path 'originates' from.</p>
  <p><code>segdepth[s]</code> stores the number of light edges any of the nodes in path s (<code>segitem[s]</code>) are required to pass through to reach the root. For operations between paths on tree, this also means the number of additional linear paths you are required to update.</p>
  <p>The code below solves the Lowest Common Ancestor problem using heavy light decomposition.</p>
  <pre class="lang-cpp prettyprint"><?php echo htmlentities(file_get_contents("cpp/heavylight.cpp")); ?></pre>
</div>
    </div>
        <div class="col-md-3">
          <div class="bs-sidebar hidden-print" role="complementary">
            <ul class="nav bs-sidenav">
              
<li>
  <a href="#ufds">Union Find Disjoint Set</a>
  <ul class="nav">
    <li><a href="#ufds-compress">Path Compression</a></li>
    <li><a href="#ufds-rank">Union by Rank</a></li>
  </ul>
</li>

<li>
  <a href="#fw">Fenwick</a>
  <ul class="nav">
    <li><a href="#fw-normal">Normal Fenwick</a></li>
    <li><a href="#fw-range">Range Update Range Query</a></li>
    <li><a href="#fw-rmq">Range Min/Max Query</a></li>
    <li><a href="#fw-2d">2D Fenwick</a></li>
  </ul>
</li>
<li>
  <a href="#seg">Segment Tree</a>
  <ul class="nav">
    <li><a href="#seg-all">All-in-One Segment Tree</a></li>
    <li><a href="#seg-lazypropagation">Lazy Propagation</a></li>
    <li><a href="#seg-lazynode">Lazy Node Creation</a></li>
    <li><a href='#seg-2d'>2D Segment Tree</a></li>
  </ul>
</li>
<li><a href="#decomp">Heavy Light Decomposition</a></li>



              
            </ul>
          </div>
        </div>
      </div>

    </div>

    <!-- Footer
================================================== -->
<footer class="bs-footer" role="contentinfo">
  <div class="container">
    <p>Code compiled and written by Ranald Lam.</p>
    <p>Copyrighted 2014. All rights reserved.</p>
    <p>Limited distribution among Raffles Institution students only.</p>
    <p>Site page views: <?php echo file_get_contents("../counter.txt"); ?></p>

  </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/docs.min.js"></script>
<script src="/js/prettify.js"></script>
<script src="/js/app.js"></script>

  </body>
</html>
<?php $counter = intval(file_get_contents("../counter.txt")); file_put_contents("../counter.txt", $counter+1); ?>

