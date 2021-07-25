import React from 'react';
import ReactDOM from 'react-dom';

function Footer() {
    return (
        <div>
            <img src="frontend/images/logo.png" height="64" width="64" alt=""></img>
        </div>
    );
}

export default Footer;

if (document.getElementById('footer')) {
    ReactDOM.render(<Footer />, document.getElementById('footer'));
}