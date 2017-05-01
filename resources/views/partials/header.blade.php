<?php
/**
 * Created by PhpStorm.
 * User: mgrloren
 * Date: 7/31/15
 * Time: 2:51 PM
 */
?>

<header class="navbar navbar-default navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/" class="navbar-brand">Home</a>
        </div>

        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/archive/index.html">Old Site</a>
                </li>
                <li>
                    <a href="/subscribe">Subscribe</a>
                </li>

                {{--
                        <li>
                          <a href="#">Category</a>
                        </li>
                        <li>
                          <a href="#">Category</a>
                        </li>
                        <li>
                          <a href="#">Category</a>
                        </li>
                --}}
            </ul>
            @if (Auth::check())
                <ul class="nav navbar-right navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                    class="glyphicon glyphicon-search"></i></a>
                        <ul class="dropdown-menu" style="padding:12px;">
                            <form class="form-inline">
                                <button type="submit" class="btn btn-default pull-right"><i
                                            class="glyphicon glyphicon-search"></i></button>
                                <input type="text" class="form-control pull-left" placeholder="Search">
                            </form>
                        </ul>
                    </li>
                    <li>
                        <a href="/auth/logout">Logout</a>
                    </li>
                </ul>
            @endif
        </nav>

    </div>
</header>
