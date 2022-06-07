<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * Template Name: Our Research
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <section class="our-research">
        <div class="fl-row fl-row-fixed-width fl-row-bg-none">
            <h1 class="section-title our-research__title">Our Research</h1>
            <section class="hero-banner hero-banner__short">
                <div class="hero-banner__container"
                    style="background-image: url(https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Understanding-Impacts-1536x864.jpg)">
                </div>
            </section>
            <div class="our-research__wrapper">
                <h1 class="section-title our-research__header">Our Research Areas</h1>
                <ul>
                    <li
                        data-body="Climate change is a shift in our planet’s weather and climate systems that brings about increasing average temperatures and more erratic weather events, rising seas, changes inhabitats and wildlife, and a myriad of other impacts. Understanding the implications and likelihood of climate change impacts on natural and human systems in the Asia-Pacific region is important for developing strategies to safeguard the region against environmental, social and economic perturbations.">
                        <img src="../images/Giving-UnderstandingImpactsIcon.png">
                        <h4>Understanding<br>Impacts</h4>
                    </li>
                    <li
                        data-body="AClimate change is a shift in our planet’s weather and climate systems that brings about increasing average temperatures and more erratic weather events, rising seas, changes inhabitats and wildlife, and a myriad of other impacts. Understanding the implications and likelihood of climate change impacts on natural and human systems in the Asia-Pacific region is important for developing strategies to safeguard the region against environmental, social and economic perturbations.">
                        <img src="../images/Giving-IdentifyingSolutionsIcon.png">
                        <h4>Identifying<br>Solutions</h4>
                    </li>
                    <li
                        data-body="BClimate change is a shift in our planet’s weather and climate systems that brings about increasing average temperatures and more erratic weather events, rising seas, changes inhabitats and wildlife, and a myriad of other impacts. Understanding the implications and likelihood of climate change impacts on natural and human systems in the Asia-Pacific region is important for developing strategies to safeguard the region against environmental, social and economic perturbations.">
                        <img src="../images/Giving-OvercomingBarriersIcon.png">
                        <h4>Overcoming<br>Barriers</h4>
                    </li>
                    <li
                        data-body="CClimate change is a shift in our planet’s weather and climate systems that brings about increasing average temperatures and more erratic weather events, rising seas, changes inhabitats and wildlife, and a myriad of other impacts. Understanding the implications and likelihood of climate change impacts on natural and human systems in the Asia-Pacific region is important for developing strategies to safeguard the region against environmental, social and economic perturbations.">
                        <img src="../images/Giving-PrioritisingActionsIcon.png">
                        <h4>Prioritising<br>Actions</h4>
                    </li>
                    <li
                        data-body="DClimate change is a shift in our planet’s weather and climate systems that brings about increasing average temperatures and more erratic weather events, rising seas, changes inhabitats and wildlife, and a myriad of other impacts. Understanding the implications and likelihood of climate change impacts on natural and human systems in the Asia-Pacific region is important for developing strategies to safeguard the region against environmental, social and economic perturbations.">
                        <img src="../images/Giving-LeveragingTechnologyIcon.png">
                        <h4>Leveraging<br>Technology</h4>
                    </li>
                </ul>
                <div class="our-research__chosen">
                    <p>Climate change is a shift in our planet’s weather and climate systems that brings about
                        increasing average temperatures and more erratic weather events, rising seas, changes inhabitats
                        and wildlife, and a myriad of other impacts. Understanding the implications and likelihood of
                        climate change impacts on natural and human systems in the Asia-Pacific region is important for
                        developing strategies to safeguard the region against environmental, social and economic
                        perturbations.</p>
                </div>
            </div>
            <section class="explore-our-research">
                <div class="fl-row fl-row-fixed-width fl-row-bg-none explore-our-research__container">
                    <h2 class="explore-our-research__title">Explore our Research</h2>
                    <ul class="explore-our-research__categories">
                        <li class="explore-our-research__category" data-category="bluecarbon"><a
                                href="/our-research?category=bluecarbon"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Understanding-Impacts-1536x864.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Blue Carbon</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="cobenefits"><a
                                href="/our-research?category=cobenefits"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Identifying-Solutions-768x432.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Co-Benefits</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="carbonprospecting"><a
                                href="/our-research?category=carbonprospecting"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Overcoming-Barriers-1536x864.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Carbon Prospecting</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="energy"><a
                                href="/our-research?category=energy"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Prioritising-Actions-1536x864.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Energy</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="agriculture"><a
                                href="/our-research?category=agriculture"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Leveraging-Technology-768x432.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Agriculture</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="ecosystems"><a
                                href="/our-research?category=ecosystems"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Understanding-Impacts-1536x864.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Ecosystems</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="extratag"><a
                                href="/our-research?category=extratag"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Identifying-Solutions-768x432.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Extra Tag</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="extratag"><a
                                href="/our-research?category=extratag"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Overcoming-Barriers-1536x864.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Extra Tag</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                        <li class="explore-our-research__category" data-category="extratag"><a
                                href="/our-research?category=extratag"><img
                                    src="https://www.nus.edu.sg/cncs/wp-content/uploads/2020/08/Prioritising-Actions-1536x864.jpg">
                                <div class="explore-our-research__content">
                                    <h4>Extra Tag</h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a></li>
                    </ul>
                </div>
            </section>
            <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                <section class="articles-listing">
                    <form class="articles-listing__search" action="/our-research">
                        <input type="search" name="s" placeholder="Search Research">
                        <button id="submitSearch">
                            <svg class="svg-inline--fa fa-search fa-w-16 collapsed" data-toggle="collapse"
                                data-target="#search-collapse" href="#" aria-hidden="true" focusable="false"
                                data-prefix="fa" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                                </path>
                            </svg>
                        </button>
                    </form>
                    <div class="articles-listing__wrapper">
                        <button id="mobileTrigger">Filter Research</button>
                        <div class="articles-listing__sidebar">
                            <h3 class="title">Filter by</h3>
                            <div class="articles-listing__list"><span>Research Areas</span>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>All</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Blue carbon</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Carbon
                                                Prospecting</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Co-Benefits</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Agriculture</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Remote Sensing</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Energy</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Ecosystems</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchAreasSidebar"><span>Wildlife Trade</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="articles-listing__list"><span>Content Type</span>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentTypeSidebar"><span>Scientific
                                                Publication</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentTypeSidebar"><span>White Papers</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentTypeSidebar"><span>Reports</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentTypeSidebar"><span>Book Chapter</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php if( have_rows('research_articles') ): ?>
                        <ul class="articles-listing__articles">
                            <?php while ( have_rows('research_articles') ) : the_row(); ?>
                            <?php if (str_contains(get_sub_field('research_areas_category'), get_query_var('category'))): ?>
                            <div class="article-card">
                                <div class="article-card__sidebar">
                                    <?php if( get_sub_field('title') ): ?>
                                    <h2 class="header">Featured Journal Article</h2>
                                    <?php endif ?>
                                    <a href="/" title="Co-benefits of forest carbon projects in Southeast Asia">Read</a>
                                </div>
                                <div class="article-card__body">
                                    <h3 class="title"><?php the_sub_field('title'); ?></h3>
                                    <?php if( get_sub_field('attribution') ): ?>
                                    <span class="attribution"><?php the_sub_field('attribution'); ?></span>
                                    <?php endif ?>
                                    <?php if( get_sub_field('body') ): ?>
                                    <p class="body"><?php the_sub_field('body'); ?></p>
                                    <?php endif ?>
                                    <?php if( get_sub_field('publish_date') ): ?>
                                    <span class="published">Published <?php the_sub_field('publish_date'); ?></span>
                                    <?php endif ?>
                                </div>
                                <div class="article-card__logo"><img
                                        src="https://nus.edu.sg/cncs/wp-content/themes/nusthemev4/assets/images/nus-logo.png">
                                </div><a href="/"
                                    title="Co-benefits of forest carbon projects in Southeast Asia">Read</a>
                            </div>
                            <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                </section>
            </div>
        </div>
    </section>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>