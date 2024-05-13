$(document).ready(function() {
    // Initialize user settings
    var userSettings = {
        Layout: "vertical",
        SidebarType: "full",
        BoxedLayout: true,
        Direction: "ltr",
        Theme: "dark", // Initial theme set to dark
        ColorTheme: "Blue_Theme",
        cardBorder: false
    };

    // Function to toggle dark mode
    function toggleDarkMode() {
        if (userSettings.Theme === "light") {
            userSettings.Theme = "dark";
            $("body").addClass("dark-theme");
            $(".moon").show();
            $(".sun").hide();
        } else {
            userSettings.Theme = "light";
            $("body").removeClass("dark-theme");
            $(".moon").hide();
            $(".sun").show();
        }
    }

    // Toggle dark mode when button is clicked
    $(".moon, .sun").on("click", function() {
        toggleDarkMode();
    });
});
