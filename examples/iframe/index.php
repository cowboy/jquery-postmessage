<?PHP

include "../index.php";

$shell['title3'] = "Iframe resizing";

$shell['h2'] = 'Cross-domain, cross-browser Iframe communcation, made easy!';

// ========================================================================== //
// SCRIPT
// ========================================================================== //

ob_start();
?>
$(function(){
  
  // Keep track of the iframe height.
  var if_height,
  
    // Pass the parent page URL into the Iframe in a meaningful way (this URL could be
    // passed via query string or hard coded into the child page, it depends on your needs).
    src = 'http://rj3.net/code/projects/jquery-postmessage/examples/iframe/child/#' + encodeURIComponent( document.location.href ),
    
    // Append the Iframe into the DOM.
    iframe = $( '<iframe " src="' + src + '" width="700" height="1000" scrolling="no" frameborder="0"><\/iframe>' )
      .appendTo( '#iframe' );
  
  // Setup a callback to handle the dispatched MessageEvent event. In cases where
  // window.postMessage is supported, the passed event will have .data, .origin and
  // .source properties. Otherwise, this will only have the .data property.
  $.receiveMessage(function(e){
    
    // Get the height from the passsed data.
    var h = Number( e.data.replace( /.*if_height=(\d+)(?:&|$)/, '$1' ) );
    
    if ( !isNaN( h ) && h > 0 && h !== if_height ) {
      // Height has changed, update the iframe.
      iframe.height( if_height = h );
    }
    
  // An optional origin URL (Ignored where window.postMessage is unsupported).
  }, 'http://rj3.net' );
  
  // And for good measure, let's send a toggle_content message to the child.
  $( '<a href="#">Show / hide Iframe content<\/a>' )
    .appendTo( '#nav' )
    .click(function(){
      $.postMessage( 'toggle_content', src, iframe.get(0).contentWindow );
      return false;
    });
  
});
<?
$shell['script'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// HTML HEAD ADDITIONAL
// ========================================================================== //

ob_start();
?>
<script type="text/javascript" src="../../jquery.ba-postmessage.js"></script>
<script type="text/javascript" language="javascript">

<?= $shell['script']; ?>

$(function(){
  
  // Syntax highlighter.
  SyntaxHighlighter.highlight();
  
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

iframe {
  border: 1px solid #000;
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
<?= $shell['donate'] ?>

<p>
  Note that both parent and child need to include the <a href="http://benalman.com/projects/jquery-postmessage-plugin/">jQuery postMessage</a> javascript, and for communication to be enabled in browsers that don't support window.postMessage, the child page must know the exact parent URL (in this example, that is done by passing the parent location into the Iframe using a hash param in the Iframe src attribute).
</p>

<p id="nav"></p>

<div id="iframe" class="clear"></div>

<h3>The parent window code</h3>

<pre class="brush:js">
<?= htmlspecialchars( $shell['script'] ); ?>
</pre>

<?
$shell['html_body'] = ob_get_contents();
ob_end_clean();

// ========================================================================== //
// DRAW SHELL
// ========================================================================== //

draw_shell();

?>
