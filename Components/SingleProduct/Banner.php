<style>
.singleProductBanner{
  padding:170px 0px;
  background-size:cover;
  background-position: center center;
  background-color:#000;
  color:#fff;
  background-image:url(<?php echo get_stylesheet_directory_uri(); ?>/img/singleProductBanner.png)
}

.singleProductBannerText{
  color:#fff;
  font-size: 60px;
  text-align: center;
  font-family:'gza';
}

span.highlight{
  position: relative;
}

span.highlight::before {
    content: attr(data-name);
    position: absolute;
    font-family: GZAOutline;
    top: 10px;
    left: -5px;
    color: #fc4f00;
    transform: translateY(-20px);
    z-index: -1;
    font-size: 60px;
    font-weight:normal;
}

span.highlight > .background {
    position: absolute;
    bottom: -20px;
    left: 15%;
    width: 70%;
    height: 40px;
    background-position: center;
    background-size: contain;
    background-repeat: no-repeat;
}

.hiddenDesktop{
  display: none;
}

@media(max-width:1024px){
  .singleProductBanner{
    padding:100px 0px;
  }

  body .singleProductBannerText{
    font-size:36px !important;
  }

  .hiddenMob{
    display:none;
  }

  .hiddenDesktop{
  display: block;
}

}

</style>

<div class="singleProductBanner">
  <div class="container">
    <h2 class="parallaxItem parallaxSet singleProductBannerText" data-parallax-rate-y="-0.5" data-parallax-offset-x="0" data-parallax-offset-y="0" style="transform: translate(1.95475px, -0.5px);"> <span>The world’s</span><br class="hiddenDesktop" /> <span>most <span style="white-space: nowrap;">eco-friendly</span></span> <br class="hiddenMob"> <br class="hiddenDesktop" /><span> <span data-name="football boot" class="highlight"> <div style="background-image: url(https://www.sokito.com/wp-content/themes/sokito/assets/images/underlineOrange.svg);" class="background lazyloaded" ></div> football boot </span> brand. </span> </h2>
      <p class="text-center">Good for your game. Good for the planet.</p>
  </div>
</div>