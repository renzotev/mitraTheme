<?php

/*
 * Template name: Redirect
 */

get_header();

?>

<?php 
    $link = (get_field( "pagina_a_redirigir")) ? get_field('pagina_a_redirigir') : site_url();
?>

<script language="javascript">
    window.location.href = "<?php echo $link; ?>";
</script>

<?php get_footer(); ?>