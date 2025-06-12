<style>
    /* General Reset */
body, h1, h2, h3, h4, h5, h6, p, ul, li, address {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif;
}

body {
    background: #fff;
    color: #000;
    line-height: 1.5;
}

/* Header */
header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 40px;
    background-color: #00473E;
    color: white;
}

header .logo img {
    width: 200px;
}

nav ul {
    display: flex;
    gap: 30px;
    font-size: 14px;
    text-transform: uppercase;
}

nav li {
    color: white;
    cursor: pointer;
}

nav li.active {
    color: #315858;
}

.social-icons {
    display: flex;
    align-items: center;
    gap: 10px;
}

.social-icons .divider {
    font-size: 30px;
    font-weight: 300;
}

.social-icons .icon {
    font-size: 20px;
}

/* Main Content */
.intro {
    display: flex;
    justify-content: space-between;
    padding: 50px 20px;
}

.intro .intro-text h1 {
    font-size: 40px;
    color: #00473E;
}

.intro .intro-image img {
    width: 50%;
    height: auto;
}

/* What is Air Curve Design */
.what-is {
    padding: 40px;
    background-color: #f5f5f5;
    text-align: center;
}

.what-is h2 {
    font-size: 36px;
    color: #00473E;
}

.what-is p {
    font-size: 16px;
    color: #464646;
    line-height: 28px;
}

/* Key Features */
.key-features {
    padding: 40px;
    text-align: center;
}

.key-features h2 {
    font-size: 36px;
    color: #00473E;
    margin-bottom: 20px;
}

.features {
    display: flex;
    gap: 30px;
    justify-content: space-around;
    flex-wrap: wrap;
}

.feature {
    width: 23%;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.feature h3 {
    font-size: 18px;
    color: #00473E;
}

.feature p {
    font-size: 16px;
    color: #464646;
}

/* Science Behind */
.science {
    padding: 40px;
    background-color: #00473E;
    color: white;
    text-align: center;
}

.science h2 {
    font-size: 36px;
    margin-bottom: 20px;
}

.science p {
    font-size: 16px;
    line-height: 28px;
}

/* Footer */
footer {
    padding: 40px;
    background-color: #00473E;
    color: white;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

footer .footer-column {
    width: 30%;
    margin-bottom: 20px;
}

footer .footer-column h4 {
    font-size: 18px;
    margin-bottom: 10px;
    text-transform: uppercase;
}

footer .footer-column ul {
    list-style: none;
}

footer .footer-column li {
    font-size: 13px;
}

footer .social-footer {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

footer .social-footer .icon {
    font-size: 28px;
    padding: 10px;
    border-radius: 50%;
    background-color: #fff;
    color: #00473E;
    cursor: pointer;
}

footer .copyright {
    font-size: 13px;
    margin-top: 20px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .intro {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .intro .intro-image img {
        width: 80%;
    }

    .features {
        flex-direction: column;
        gap: 20px;
    }

    footer .footer-column {
        width: 100%;
        margin-bottom: 20px;
    }
}

</style>
<body>
<div style="width: 1746px; height: 0px; outline: 1px black solid; outline-offset: -0.50px"></div>
</body>
</html>
