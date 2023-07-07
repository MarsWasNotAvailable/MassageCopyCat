<header>
    <nav id="NavigationBar">
        <a id="Home" class="navigational" href="./index.php"><img src="./cache/massage_logo_header-1.png" alt="company header logo"></a>
        <div id="HamburgerMenu">
            <button id="HamburgerButton" class="navigational"><img src="./cache/icons_Hamburger.png" onclick="ToggleHamburger()"></button>
            <ul id="HamLinks" class="Collapsed">
                <li class="navigational"><a href="./index.php">Homepage</a></li>
                <li class="navigational"><a href="./blog.php">Blog</a></li>
                <li class="navigational"><a href="./gestion.php">New Article</a></li>
                <li class="navigational"><button>Contact</button></li>
            </ul>
        </div>
    </nav>
    <script>
        function GetCurrentStyleOf(Element)
        {
            return Element.currentStyle ? Element.currentStyle.display : getComputedStyle(Element, null).display;
        }

        // Scope
        {
            let HamburgerButton = document.getElementById('HamburgerButton');

            // console.log(HamburgerButton);

            if (GetCurrentStyleOf(HamburgerButton) === "flex")
            {
                document.getElementById("HamLinks").className = "Collapsed";
            }
        }

        function ToggleHamburger(){
            let HamLinks = document.getElementById('HamLinks');

            if (HamLinks.className === "Visible")
            {
                HamLinks.className = "Collapsed";
            }
            else
            {
                HamLinks.className = "Visible";
            }
        }
    </script>
</header>
