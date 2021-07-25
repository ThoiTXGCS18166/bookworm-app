import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router, Link, Route } from 'react-router-dom';

function Navbar() {
    return (
        <div>
            <nav className="navbar navbar-expand-lg navbar-light bg-light">
                <div className="container-fluid">
                    <a className="navbar-brand" href="#"><img src="frontend/images/logo.png" height="32" width="32" alt=""></img>
                        <strong> BOOKWORM</strong></a>
                    <button className="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul className="navbar-nav me-auto mb-2 mb-lg-0">

                        </ul>
                        <form class="d-flex">
                            <a className="nav-link" href="{{URL::to('/home')}}"><u>Home</u></a>
                            <a className="nav-link" href="{{URL::to('/shop')}}">Shop</a>
                            <a className="nav-link" href="{{URL::to('/about')}}">About</a>
                            <a className="nav-link" href="{{URL::to('/show-cart')}}">Cart(0)</a>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    );
}

export default Navbar;

if (document.getElementById('navbar')) {
    ReactDOM.render(<Navbar />, document.getElementById('navbar'));
}
