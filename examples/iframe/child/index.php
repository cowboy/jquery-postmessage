<?PHP

include "../../index.php";
$base = '../../';

$shell['title3'] = "Iframe resizing";

$shell['h2'] = 'Cross-domain, cross-browser Iframe communcation, made easy!';

// ========================================================================== //
// SCRIPT
// ========================================================================== //

ob_start();
?>
$(function(){
  // Get the parent page URL as it was passed in, for browsers that don't support
  // window.postMessage (this URL could be hard-coded).
  var parent_url = decodeURIComponent( document.location.hash.replace( /^#/, '' ) ),
    link;
  
  // The first param is serialized using $.param (if not a string) and passed to the
  // parent window. If window.postMessage exists, the param is passed using that,
  // otherwise it is passed in the location hash (that's why parent_url is required).
  // The second param is the targetOrigin.
  function setHeight() {
    $.postMessage({ if_height: $('body').outerHeight( true ) }, parent_url, parent );
  };
  
  // Bind all this good stuff to a link, for maximum clickage.
  link = $( '<a href="#">Show / hide content<\/a>' )
    .appendTo( '#nav' )
    .click(function(){
      $('#toggle').toggle();
      setHeight();
      return false;
    });
  
  // Now that the DOM has been set up (and the height should be set) invoke setHeight.
  setHeight();
  
  // And for good measure, let's listen for a toggle_content message from the parent.
  $.receiveMessage(function(e){
    if ( e.data === 'toggle_content' ) {
      link.triggerHandler( 'click' );
    }
  }, 'http://benalman.com' );
});
<?
$shell['script'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML HEAD ADDITIONAL
// ========================================================================== //

ob_start();
?>
<script type="text/javascript" src="../../../jquery.ba-postmessage.js"></script>
<script type="text/javascript" language="javascript">

<?= $shell['script']; ?>

$(function(){
  
  // Syntax highlighter.
  SyntaxHighlighter.highlight();
  
  // Oops?
  if ( window == top ) {
    $( '<h2>This page is part of a full example. <a href="http://benalman.com/code/projects/jquery-postmessage/examples/iframe/">Click here to return!<\/a><\/h2>')
      .prependTo( 'body' );
  }
  
});

</script>
<style type="text/css" title="text/css">

/*
bg: #FDEBDC
bg1: #FFD6AF
bg2: #FFAB59
orange: #FF7F00
brown: #913D00
lt. brown: #C4884F
*/

#page {
  width: auto;
}

#header, #footer {
  display: none;
}

html, body {
  background: #eee;
}

</style>
<?
$shell['html_head'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML BODY
// ========================================================================== //

ob_start();
?>

<p>
  This Iframe contains content from another domain. Click "Show / hide content" and the Iframe should tell the parent frame to resize using window.postMessage if available, otherwise using the document hash (IE6 / 7).
</p>

<p id="nav"></p>

<div id="toggle">

<h3>The child frame code</h3>

<pre class="brush:js">
<?= htmlspecialchars( $shell['script'] ); ?>
</pre>

</div>

<?
$shell['html_body'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// DRAW SHELL
// ========================================================================== //

draw_shell();

?>
