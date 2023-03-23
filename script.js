// script.js
$("#resume-form").on("submit", async (event) => {
    event.preventDefault();

    const resume = $("#resume").val();
    $("#loading").removeAttr("hidden"); // Show the loading spinner
    $("#recommendations").html(""); // Clear previous recommendations

    console.log("Sending request to analyze.php..."); // Debug message

    try {
        const response = await fetch("analyze.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded",
            },
            body: "resume=" + encodeURIComponent(resume),
        });

        if (response.ok) {
            const text = await response.text();
            $("#recommendations").html(text);
        } else {
            $("#recommendations").html("An error occurred. Please try again.");
            console.error("Error:", response.statusText);
        }
    } catch (error) {
        $("#recommendations").html("An error occurred. Please try again.");
        console.error("Error:", error);
    } finally {
        $("#loading").attr("hidden", true); // Hide the loading spinner
    }
});
