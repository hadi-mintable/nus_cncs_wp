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
                <?php if( get_field('hero_banner_image') ):
                                $img = get_field('hero_banner_image'); ?>
                <div class="hero-banner__container" style="background-image: url(<?php echo $img['url']; ?>)">
                </div>
                <?php endif; ?>

            </section>
            <div class="our-research__wrapper">
                <h1 class="section-title our-research__header">Our Research Areas</h1>
                <ul>
                    <?php while ( have_rows('research_areas') ) : the_row(); ?>
                    <li data-body="<?php the_sub_field('body_text') ?>">
                        <?php if( get_sub_field('icon') ):
                                $img = get_sub_field('icon'); ?>
                        <?php endif; ?>
                        <img src="<?php echo $img['url']; ?>">
                        <h4><?php the_sub_field('title') ?></h4>
                    </li>
                    <?php endwhile; ?>
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
                        <?php while ( have_rows('explore_our_research_category_cards') ) : the_row(); ?>
                        <li class="explore-our-research__category"
                            data-category="<?php the_sub_field('parameter_id') ?>">
                            <a
                                href="/nus_cncs/research/our-research?researchCategory=<?php the_sub_field('parameter_id') ?>">
                                <?php if( get_sub_field('background_image') ):
                                $img = get_sub_field('background_image'); ?>
                                <img src="<?php echo $img['url']; ?>">
                                <?php endif; ?>
                                <div class="explore-our-research__content">
                                    <h4><?php the_sub_field('title') ?></h4><i class="fa-solid fa-arrow-right-long"></i>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </section>
            <div class="fl-row fl-row-fixed-width fl-row-bg-none">
                <section class="articles-listing">
                    <div class="articles-listing__search">
                        <input type="search" placeholder="Search Research">
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
                    </div>
                    <div class="articles-listing__wrapper">
                        <button id="mobileTrigger">Filter Research</button>
                        <div class="articles-listing__sidebar">
                            <h3 class="title">Filter by</h3>
                            <div class="articles-listing__list"><span>Research Areas</span>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory" data-value=""><span>All</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="blue_carbon"><span>Blue carbon</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="carbon_prospecting"><span>Carbon
                                                Prospecting</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="cobenefits"><span>Co-Benefits</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="agriculture"><span>Agriculture</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="remotesensing"><span>Remote Sensing</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="energy"><span>Energy</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="ecosystems"><span>Ecosystems</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="researchCategory"
                                                data-value="wildlife_trade"><span>Wildlife Trade</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div class="articles-listing__list"><span>Content Type</span>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentType"
                                                data-value="scientific_publication"><span>Scientific
                                                Publication</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentType" data-value="white_papers"><span>White
                                                Papers</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentType"
                                                data-value="reports"><span>Reports</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="contentType" data-value="book_chapter"><span>Book
                                                Chapter</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php if( have_rows('research_articles') ): ?>
                        <ul class="articles-listing__articles">
                            <?php while ( have_rows('research_articles') ) : the_row(); ?>
                            <?php if (str_contains(get_sub_field('research_areas_category'), get_query_var('researchCategory'))): ?>
                            <?php if (str_contains(get_sub_field('content_type'), get_query_var('contentType'))): ?>
                            <?php $search = get_sub_field('title') . get_sub_field('attribution') . get_sub_field('body'); ?>
                            <?php $searchValue = get_query_var('search'); ?>
                            <?php if (preg_match("/{$searchValue}/i", $search)): ?>
                            <div class="article-card">
                                <div class="article-card__sidebar">
                                    <?php if( get_sub_field('title') ): ?>
                                    <h2 class="header">Featured Journal Article</h2>
                                    <?php endif ?>
                                    <a href="/" title="<?php the_sub_field('title'); ?>">Read</a>
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
                            <?php endif;?>
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