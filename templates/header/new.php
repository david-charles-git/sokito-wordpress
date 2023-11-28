<?php

/**
 * Template part with actual header.
 *
 * @since 1.0.0
 *
 * @package The7\Templates
 */

defined('ABSPATH') || exit;

?>
<!DOCTYPE html>
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
  <!-- Google Tag Manager -->
  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-T3KWTZ')
  </script>
  <!-- End Google Tag Manager -->

  <meta charset="<?php bloginfo('charset'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta name="theme-color" content="#fad762" />
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <?php
  wp_head();
  ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    header .ImageContainer {
      max-height: 100%;
      overflow: hidden;
    }

    header .ImageContainer>.inner {
      padding: 0;
    }

    header .ImageContainer>.inner a {
      height: 100%;
    }

    header .ImageContainer>.inner img {
      object-fit: cover;
    }
  </style>

  <style>
    header .TiltContainer,
    footer .TiltContainer {
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
      display: block;
    }

    header .tilt,
    footer .tilt {
      position: relative;
      width: 100%;
      height: 105%;
      top: -2.5%;
      left: 0%;
      display: block;
    }

    header .tilt>.inner,
    footer .tilt>.inner {
      height: 100%;
      padding: 0;
    }
  </style>

  <style>
    header .Button,
    footer .Button {
      display: inline-block;
      width: auto;
    }

    header .Button>.inner,
    footer .Button>.inner {
      display: inline-block;
      padding: 0;
      position: relative;
      width: auto;
    }

    header .Button>.inner .TiltContainer,
    footer .Button>.inner .TiltContainer {
      height: 100%;
      left: 0;
      position: absolute;
      top: 0;
    }

    header .Button>.inner p,
    header .Button>.inner a,
    footer .Button>.inner p,
    footer .Button>.inner a {
      cursor: pointer;
      font-weight: 600;
      padding: 10px 20px;
      position: relative;
      width: auto;
    }

    header .Button>.inner p img,
    header .Button>.inner a img,
    footer .Button>.inner p img,
    footer .Button>.inner a img {
      aspect-ratio: 1/1;
      display: inline-block;
      margin-right: 5px;
      object-fit: cover;
      vertical-align: middle;
      width: 30px;
    }

    header .Button.tiltHover>.inner .TiltContainer,
    footer .Button.tiltHover>.inner .TiltContainer {
      opacity: 0;
      transition: opacity 200ms ease;
    }

    header .Button.tiltHover:hover>.inner .TiltContainer,
    footer .Button.tiltHover:hover>.inner .TiltContainer,
    header .active .Button.tiltHover>.inner .TiltContainer,
    footer .active .Button.tiltHover>.inner .TiltContainer {
      opacity: 1;
    }

    header .ToTopButton,
    footer .ToTopButton {
      bottom: 30px;
      cursor: pointer;
      height: 50px;
      position: fixed;
      right: 0;
      transition: bottom 100ms ease;
      width: 50px;
    }

    header .ToTopButton .tilt,
    footer .ToTopButton .tilt {
      height: 100%;
      left: 0;
      opacity: 0.5;
      top: 0;
      transition: opacity 200ms ease;
      width: 100%;
    }

    header .ToTopButton>.inner,
    footer .ToTopButton>.inner {
      display: grid;
      height: 50px;
      justify-content: center;
      padding: 0;
    }

    header .ToTopButton>.inner .toTop,
    footer .ToTopButton>.inner .toTop {
      border-bottom: 10px solid #13121C;
      border-left: 10px solid transparent;
      border-radius: 3px;
      border-right: 10px solid transparent;
      height: 0px;
      width: 20px;
    }

    header .ToTopButton:hover .tilt,
    footer .ToTopButton:hover .tilt {
      opacity: 0.75;
    }

    @media (max-width: 425px) {

      header .Button>.inner p img,
      header .Button>.inner a img,
      footer .Button>.inner p img,
      footer .Button>.inner a img {
        width: 25px;
      }
    }
  </style>

  <style>
    header .Header {
      padding: 30px 0;
    }

    header .Header>.outer>.inner {
      grid-template-columns: 300px 1fr;
      grid-template-areas: "logo navigation";
      align-items: center;
      display: grid;
    }

    header .Header>.outer>.inner .logo {
      grid-area: logo;
    }

    header .Header>.outer>.inner nav {
      display: grid;
      grid-area: navigation;
    }

    header .Header>.outer>.inner nav>.inner {
      padding: 0;
      grid-gap: 100px;
      justify-content: end;
      display: grid;
    }

    header .Header>.outer>.inner nav>.inner .Button:hover a,
    header .Header>.outer>.inner nav>.inner .active .Button a {
      color: #FAD762;
    }

    header .Header>.outer>.inner nav .mobileCATContaiiner {
      display: none;
    }

    header .Header>.outer>.inner .burgerMenuContainer {
      display: none;
    }

    @media (max-width: 1440px) {
      header .Header>.outer>.inner {
        grid-template-columns: 200px 1fr;
      }

      header .Header>.outer>.inner nav>.inner {
        grid-gap: 30px;
      }
    }

    @media (max-width: 1024px) {
      header .Header>.outer>.inner nav>.inner {
        grid-gap: 0px;
      }

      header .Header>.outer>.inner nav>.inner .Button a {
        font-size: 15px;
        line-height: 25px;
      }
    }

    @media (max-width: 768px) {
      header .Header>.outer>.inner {
        grid-template-columns: 1fr;
        grid-template-areas: "logo";
        max-width: 300px;
      }

      header .Header>.outer>.inner .logo .ImageContainer {
        justify-content: center;
      }

      header .Header>.outer>.inner .logo .ImageContainer img {
        max-height: 40px;
        object-fit: contain;
      }

      header .Header>.outer>.inner .navigation {
        position: fixed;
        right: 0;
        top: 0;
        height: 0vh;
        width: 100vw;
        overflow: hidden;
        overflow-y: scroll;
        align-content: space-between;
        justify-content: center;
        padding: 0;
        background-color: #13121C;
        transition: height 200ms ease, padding 200ms ease;
      }

      header .Header>.outer>.inner .navigation.active {
        height: 100vh;
        padding: 150px 0;
      }

      header .Header>.outer>.inner .navigation.active>.inner {
        text-align: center;
      }

      header .Header>.outer>.inner .navigation.active>.inner .Button>.outer {
        opacity: 1;
        transition: opacity 100ms ease;
      }

      header .Header>.outer>.inner .navigation::-webkit-scrollbar {
        display: none;
      }

      header .Header>.outer>.inner .navigation>.inner {
        grid-template-columns: 1fr !important;
        text-align: center;
        min-width: 300px;
        padding: 0 5vw;
      }

      header .Header>.outer>.inner .navigation>.inner .Button>.inner a,
      .Header>.outer>.inner .navigation>.inner .Button>.inner p {
        text-align: center;
        color: #FAD762;
      }

      header .Header>.outer>.inner .navigation .mobileCATContaiiner {
        display: block;
      }

      header .Header>.outer>.inner .navigation .mobileCATContaiiner>.inner {
        display: block;
        text-align: center;
      }

      header .Header>.outer>.inner .navigation .mobileCATContaiiner>.inner .Button {
        display: inline-block;
        width: auto;
        vertical-align: middle;
        margin: 0 20px 20px 20px;
      }

      header .Header>.outer>.inner .navigation .mobileCATContaiiner>.inner .Button .TiltContainer {
        opacity: 0.1;
      }

      header .Header>.outer>.inner .navigation .mobileCATContaiiner>.inner .Button:hover .TiltContainer {
        opacity: 0.5;
      }

      header .Header>.outer>.inner .burgerMenuContainer {
        display: block;
        grid-area: burgerMenu;
        position: absolute;
        top: -32px;
        right: 2.5%;
        width: 50px;
        height: 50px;
        cursor: pointer;
        z-index: 4;
      }

      header .Header>.outer>.inner .burgerMenuContainer .tiltContainer .tilt {
        height: 105%;
        top: -5%;
      }

      header .Header>.outer>.inner .burgerMenuContainer>.inner {
        display: grid;
        justify-content: center;
      }

      header .Header>.outer>.inner .burgerMenuContainer>.inner .burgerMenu {
        width: 20px;
        height: 50px;
        background-position: center center;
        background-size: contain;
        background-repeat: no-repeat;
      }

      header .Header>.outer>.inner .burgerMenuContainer.open {
        position: fixed;
        top: 0;
      }
    }

    @media (max-width: 425px) {
      header .Header>.outer>.inner .burgerMenuContainer {
        width: 40px;
        height: 40px;
      }

      header .Header>.outer>.inner .burgerMenuContainer .TiltContainer {
        width: 40px;
        height: 40px;
      }

      header .Header>.outer>.inner .burgerMenuContainer>.inner .burgerMenu {
        height: 40px;
      }

      header .Header>.outer>.inner .logo .ImageContainer>.inner img {
        max-height: 30px;
      }
    }
  </style>

  <style>
    header,
    header *,
    header ::after,
    header ::before,
    footer,
    footer *,
    footer ::after,
    footer ::before {
      margin: 0 auto;
      padding: 0;
      width: 100%;
      max-width: 100vw;
      box-sizing: border-box;
      font-size: 0;
      font-family: "Poppins", Arial, Helvetica, sans-serif;
      font-weight: 400;
      color: #13121C;
      z-index: 2;
      border: none;
      outline: none;
      text-decoration: none;
      font-style: none;
      display: block;
      grid-gap: 0px;
      grid-template-columns: 1fr;
      align-content: center;
      justify-content: start;
      align-items: start;
      vertical-align: middle;
    }

    header {
      z-index: 9;
      position: relative;
    }

    header p,
    header a,
    header label,
    header input,
    header li,
    header .font-regular,
    header .font-regular *,
    footer p,
    footer a,
    footer label,
    footer input,
    footer li,
    footer .font-regular,
    footer .font-regular * {
      font-size: 18px;
      line-height: 30px;
      letter-spacing: 0.5px;
      font-family: "Poppins", Arial, Helvetica, sans-serif;
      display: inline-block;
      vertical-align: middle;
    }

    header p a,
    footer p a {
      display: inline;
      vertical-align: top;
    }

    header strong,
    header b,
    header .font-weight-bold,
    header .font-weight-bold *,
    footer strong,
    footer b,
    footer .font-weight-bold,
    footer .font-weight-bold * {
      font-weight: 600 !important;
    }

    header .font-weight-regular,
    header .font-weight-regular *,
    footer .font-weight-regular,
    footer .font-weight-regular * {
      font-weight: 400 !important;
    }

    header .font-weight-light,
    header .font-weight-light *,
    footer .font-weight-light,
    footer .font-weight-light * {
      font-weight: 200 !important;
    }

    header i,
    header em,
    header .italic,
    footer i,
    footer em,
    footer .italic {
      font-size: inherit;
      line-height: inherit;
      letter-spacing: inherit;
      font-family: inherit;
      display: inline;
      vertical-align: middle;
      font-style: italic;
    }

    header span,
    footer span {
      font-size: inherit;
      line-height: inherit;
      letter-spacing: inherit;
      font-family: inherit;
      display: inline;
      vertical-align: middle;
    }

    header .p-xLarge,
    header .font-xLarge,
    header .font-xLarge *,
    footer .p-xLarge,
    footer .font-xLarge,
    footer .font-xLarge * {
      font-size: 35px;
      line-height: 45px;
      letter-spacing: 1px;
    }

    header .p-large,
    header .font-large,
    header .font-large *,
    footer .p-large,
    footer .font-large,
    footer .font-large * {
      font-size: 30px;
      line-height: 40px;
      letter-spacing: 1px;
    }

    header .p-small,
    header .font-small,
    header .font-small *,
    footer .p-small,
    footer .font-small,
    footer .font-small * {
      font-size: 15px;
      line-height: 25px;
      letter-spacing: 0.5px;
    }

    header .p-xSmall,
    header .font-xSmall,
    header .font-xSmall *,
    footer .p-xSmall,
    footer .font-xSmall,
    footer .font-xSmall * {
      font-size: 10px;
      line-height: 20px;
      letter-spacing: 0.5px;
    }

    header .font-display,
    header .font-display *,
    footer .font-display,
    footer .font-display * {
      font-family: "EB Garamond", Arial, Helvetica, sans-serif !important;
    }

    header .font-default,
    header .font-default *,
    footer .font-default,
    footer .font-default * {
      font-family: "Poppins", Arial, Helvetica, sans-serif !important;
    }

    header .clrBlack,
    header .clrBlack *,
    footer .clrBlack,
    footer .clrBlack * {
      color: #13121C !important;
    }

    header .clrWhite,
    header .clrWhite *,
    footer .clrWhite,
    footer .clrWhite * {
      color: #ffffff !important;
    }

    header .clrMustard,
    header .clrMustard *,
    footer .clrMustard,
    footer .clrMustard * {
      color: #FAD762 !important;
    }

    header .clrRed,
    header .clrRed *,
    footer .clrRed,
    footer .clrRed * {
      color: #F27250 !important;
    }

    header .clrPink,
    header .clrPink *,
    footer .clrPink,
    footer .clrPink * {
      color: #F0BEC9 !important;
    }

    header .clrBlue,
    header .clrBlue *,
    footer .clrBlue,
    footer .clrBlue * {
      color: #84A9B5 !important;
    }

    header .clrLightMustard,
    header .clrLightMustard *,
    footer .clrLightMustard,
    footer .clrLightMustard * {
      color: #FCFFD4 !important;
    }

    header .outer,
    footer .outer {
      position: relative;
      max-width: 1920px;
    }

    header .inner,
    footer .inner {
      padding: 0 50px;
      max-width: 1300px;
    }

    header .overflow-hidden,
    header .overflow-hidden {
      overflow: hidden;
    }

    header .display-none,
    footer .display-none {
      display: none;
    }

    header .cursor-default,
    header .cursor-default *,
    footer .cursor-default,
    footer .cursor-default * {
      cursor: default !important;
    }

    header .hide-mobile,
    footer .hide-mobile {
      display: inline-block !important;
    }

    header .hide-desktop,
    footer .hide-desktop {
      display: none !important;
    }

    @media (max-width: 1024px) {}

    @media (max-width: 768px) {

      header .inner,
      footer .inner {
        padding: 0;
      }

      header p,
      header a,
      header label,
      header input,
      header li,
      header .font-regular,
      header .font-regular *,
      footer p,
      footer a,
      footer label,
      footer input,
      footer li,
      footer .font-regular,
      footer .font-regular * {
        font-size: 15px;
        line-height: 25px;
      }

      header .p-xLarge,
      header .font-xLarge,
      header .font-xLarge *,
      footer .p-xLarge,
      footer .font-xLarge,
      footer .font-xLarge * {
        font-size: 25px;
        line-height: 35px;
      }

      header .p-large,
      header .font-large,
      header .font-large *,
      footer .p-large,
      footer .font-large,
      footer .font-large * {
        font-size: 20px;
        line-height: 30px;
      }

      header .hide-mobile,
      footer .hide-mobile {
        display: none !important;
      }

      header .hide-desktop,
      footer .hide-desktop {
        display: block !important;
      }
    }

    @media (max-width: 425px) {

      header p,
      header a,
      header label,
      header input,
      footer p,
      footer a,
      footer label,
      footer input {
        font-size: 15px;
        line-height: 25px;
      }

      header .p-xLarge,
      footer .p-xLarge {
        font-size: 25px;
        line-height: 35px;
      }

      header .p-large,
      footer .p-large {
        font-size: 20px;
        line-height: 30px;
      }

      header .p-small,
      footer .p-small {
        font-size: 12px;
        line-height: 22px;
      }

      header .p-xSmall,
      footer .p-xSmall {
        font-size: 8px;
        line-height: 18px;
      }
    }
  </style>

  <style>
    footer .Footer {
      background-color: #13121C;
      position: relative;
    }

    footer .Footer::before {
      content: "";
      display: block;
      position: absolute;
      top: -20px;
      right: 0;
      height: 0;
      border-style: solid;
      border-width: 0px 0px 20px 98vw;
      border-color: transparent transparent #13121C transparent;
    }

    footer .Footer>.outer>.inner .upper {
      padding: 100px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.4);
    }

    footer .Footer>.outer>.inner .upper>.inner {
      position: unset;
      padding: 0;
    }

    footer .Footer>.outer>.inner .upper>.inner nav>.inner {
      display: grid;
      max-width: 600px;
      padding: 0;
    }

    footer .Footer>.outer>.inner .upper>.inner nav>.inner .Button .TiltContainer {
      transition: opacity 200ms ease;
      opacity: 0.1;
    }

    footer .Footer>.outer>.inner .upper>.inner nav>.inner .Button:hover .TiltContainer {
      opacity: 0.5;
    }

    footer .Footer>.outer>.inner .lower {
      padding: 30px 0;
    }

    footer .Footer>.outer>.inner .lower>.inner {
      grid-template-columns: repeat(2, 1fr);
      grid-gap: 50px;
      padding: 0;
      display: grid;
    }

    footer .Footer>.outer>.inner .lower>.inner .left>.inner {
      grid-template-columns: repeat(2, auto);
      justify-content: start;
      grid-gap: 30px;
      padding: 0;
      display: grid;
    }

    footer .Footer>.outer>.inner .lower>.inner .left>.inner .ImageContainer>.inner {
      height: 50px;
    }

    footer .Footer>.outer>.inner .lower>.inner .right>.inner {
      padding: 0;
    }

    footer .Footer>.outer>.inner .lower>.inner .right>.inner nav>.inner {
      grid-template-columns: repeat(3, auto);
      justify-content: end;
      grid-gap: 0px;
      padding: 0;
      display: grid;
    }

    footer .Footer>.outer>.inner .lower>.inner .right>.inner nav>.inner a {
      font-weight: 400;
    }

    .TermsConditions {
      background-color: #13121C;
      position: relative;
    }

    .TermsConditions>.outer>.inner {
      padding: 10px 50px;
      max-width: 1300px;
      text-align: right;
    }

    @media (max-width: 1024px) {
      footer .Footer>.outer>.inner .upper {
        padding: 30px 0;
      }

      footer .Footer>.outer>.inner .upper>.inner nav>.inner {
        display: block;
        text-align: center;
      }

      footer .Footer>.outer>.inner .upper>.inner nav>.inner .Button {
        display: inline-block;
        width: auto;
        margin: 20px;
      }

      footer .Footer>.outer>.inner .upper>.inner nav>.inner .Button>.outer {
        width: auto;
        display: inline-block;
        margin: 0 30px 30px 30px;
      }

      footer .Footer>.outer>.inner .lower>.inner {
        grid-template-columns: repeat(1, 1fr);
        grid-template-areas: "top" "bottom";
        grid-gap: 30px;
      }

      footer .Footer>.outer>.inner .lower>.inner .left {
        grid-area: bottom;
      }

      footer .Footer>.outer>.inner .lower>.inner .left>.inner {
        justify-content: center;
      }

      footer .Footer>.outer>.inner .lower>.inner .right {
        grid-area: top;
      }

      footer .Footer>.outer>.inner .lower>.inner .right>.inner nav>.inner {
        display: block;
        text-align: center;
      }

      footer .Footer>.outer>.inner .lower>.inner .right>.inner nav>.inner .Button {
        display: inline-block;
        width: auto;
      }

      footer .Footer>.outer>.inner .lower>.inner .right>.inner nav>.inner .Button .outer {
        display: inline-block;
        width: auto;
        margin: 0 10px 10px 10px;
      }

      .TermsConditions>.outer>.inner {
        text-align: center;
      }
    }
  </style>

  <style>
    script,
    #footer,
    .masthead,
    a.scroll-top.on,
    .ToTopButton {
      display: none;
    }

    #fancy-header .fancy-title>span {
      color: #4b4b4b;
    }
  </style>

  <style>
    #page.newPage {
      display: block;
    }

    #page.newPage .grid {
      display: -ms-grid;
      display: grid;
      -ms-grid-columns: 100%;
      grid-template-columns: 100%;
      grid-gap: 0;
      -webkit-box-align: center;
      -ms-flex-align: center;
      align-items: center;
      -ms-flex-line-pack: center;
      align-content: center;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      justify-content: center;
    }

    #page.newPage .heroBanner-slim {
      position: relative;
      padding: 0 clamp(20px, 5vw, 50px);
    }

    #page.newPage .heroBanner-slim>.background {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #fad762;
    }

    #page.newPage .heroBanner-slim>.inner {
      max-width: 1200px;
      margin: 0 auto;
      min-height: 300px;
    }

    #page.newPage .heroBanner-slim>.inner>.title {
      display: inline-block;
      font-family: EB Garamond, Arial, Helvetica, sans-serif;
      font-size: clamp(40px, 10vw, 60px) !important;
      line-height: 1.1 !important;
      font-weight: 600;
      letter-spacing: 0.01em;
      color: #13121c;
      position: relative;
      margin: 0;
      padding: clamp(20px, 5vw, 50px) 0;
      max-width: 650px;
    }

    #page.newPage article {
      margin: 0 auto;
      max-width: 1300px;
      padding: 0 clamp(20px, 5vw, 50px);
      padding-bottom: 100px;
    }

    #page.newPage .team-media,
    #page.newPage .team-desc {
      text-align: center;
    }

    #page.newPage article article {
      margin: unset;
      max-width: unset;
      padding: unset;
    }

    #page.newPage .entry-content>div:nth-child(1) {
      text-align: center;
    }

    #page.newPage .entry-content>div:nth-child(1)>div {
      display: inline-block;
      vertical-align: middle;
      float: none;
    }

    #page.newPage .entry-content>div:nth-child(1)>div .wpb_text_column {
      text-align: left;
    }

    #page.newPage .entry-content .upb_row_bg.vcpb-default {
      background-image: none !important;
    }


    @media (max-width: 767px) {
      #page.newPage .heroBanner-slim>.inner {
        min-height: 200px;
      }

      #page.newPage .heroBanner-slim>.inner>.title {
        text-align: center;
        max-width: unset;
      }
    }
  </style>
</head>

<body <?php body_class(); ?>>
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T3KWTZ" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div class="App">
    <header style="background-color: #FAD762;">
      <section class="Header animHeader" style="translate: none; rotate: none; scale: none; transform: translate(0px, 0px);">
        <div class="outer">
          <div class="inner">
            <div class="logo">
              <div class="ImageContainer">
                <div class="inner"><a href="https://www.addmustard.com/"><img src="https://www.addmustard.com/wp-content/uploads/2023/01/logo.png" alt="home button"></a></div>
              </div>
            </div>

            <nav id="reactNavigation" class="navigation">
              <div class="inner" style="grid-template-columns: repeat(3, auto);">
                <div class="item">
                  <div class="Button tiltHover">
                    <div class="inner">
                      <div class="TiltContainer" style="background-color: rgb(19, 18, 28); transform: rotate(-1deg) skewX(0deg);"></div>
                      <a class="font-weight-regular" rel="noreferrer" href="/what-we-do/" target="_self"> What we do</a>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="Button tiltHover">
                    <div class="inner">
                      <div class="TiltContainer" style="background-color: rgb(19, 18, 28); transform: rotate(-2deg) skewX(-1deg);"></div>
                      <a href="https://www.addmustard.com/team/" class="font-weight-regular" target="_self" rel="noreferrer"> Who we are</a>
                    </div>
                  </div>
                </div>

                <div class="item">
                  <div class="Button tiltHover">
                    <div class="inner">
                      <div class="TiltContainer" style="background-color: rgb(19, 18, 28); transform: rotate(3deg) skewX(-3deg);"></div>
                      <a href="https://www.addmustard.com/how-can-we-help/" class="font-weight-regular" target="_self" rel="noreferrer"> How can we help?</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mobileCATContaiiner">
                <div class="inner">
                  <div class="Button">
                    <div class="inner">
                      <div class="TiltContainer" style="background-color: rgb(255, 255, 255); transform: rotate(-1deg) skewX(3deg);"></div>
                      <a href="https://wa.me/447457404143" class="clrWhite" target="_blank" rel="noreferrer"><img src="https://www.addmustard.com/wp-content/themes/dt-the7/images/whatsApp_icon.svg" alt="button icon"> WhatsApp</a>
                    </div>
                  </div>
                  <div class="Button">
                    <div class="inner">
                      <div class="TiltContainer" style="background-color: rgb(255, 255, 255); transform: rotate(3deg) skewX(1deg);"></div>
                      <a href="mailto: italladdsup@addmustard.com?subject=addmustard | Website Enquiry" class="clrWhite" target="_self" rel="noreferrer"><img src="https://www.addmustard.com/wp-content/themes/dt-the7/images/email_icon.svg" alt="button icon"> Email</a>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
            <div class="burgerMenuContainer" onclick="openCloseBurgerMenu()" openClose="open">
              <div class="TiltContainer">
                <div class="tilt">
                  <div class="inner" style="background-color: rgb(19, 18, 28); transform: rotate(-3deg) skewX(-4deg);"></div>
                </div>
              </div>
              <div class="inner">
                <div class="burgerMenu" style="background-image: url(https://www.addmustard.com/wp-content/themes/dt-the7/images/burgerMenuOpen_icon.svg);"></div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </header>
  </div>

  <div id="page" class="newPage">