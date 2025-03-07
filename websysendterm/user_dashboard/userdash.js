// scripts.js

document.getElementById('dropzone').addEventListener('click', function() {
    document.getElementById('recipeImage').click();
  });
  
  document.getElementById('recipeImage').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById('previewImage').setAttribute('src', event.target.result);
        document.getElementById('previewImage').style.display = 'block';
      };
      reader.readAsDataURL(file);
    }
  });
  
  const dropzone = document.getElementById('dropzone');
  
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, preventDefaults, false);
  });
  
  function preventDefaults(e) {
    e.preventDefault();
    e.stopPropagation();
  }
  
  ['dragenter', 'dragover'].forEach(eventName => {
    dropzone.addEventListener(eventName, highlight, false);
  });
  
  ['dragleave', 'drop'].forEach(eventName => {
    dropzone.addEventListener(eventName, unhighlight, false);
  });
  
  function highlight() {
    dropzone.classList.add('border-primary');
  }
  
  function unhighlight() {
    dropzone.classList.remove('border-primary');
  }
  
  dropzone.addEventListener('drop', handleDrop, false);
  
  function handleDrop(e) {
    const dt = e.dataTransfer;
    const files = dt.files;
  
    if (files.length > 0) {
      const file = files[0];
      if (file.type.match('image.*')) {
        const reader = new FileReader();
        reader.onload = function(event) {
          document.getElementById('previewImage').setAttribute('src', event.target.result);
          document.getElementById('previewImage').style.display = 'block';
        };
        reader.readAsDataURL(file);
      }
    }
  }
  
  // function openTab(tabId) {
  //   var tabs = document.querySelectorAll('.tab-content');
  //   tabs.forEach(function(tab) {
  //     tab.classList.remove('active-tab');
  //   });
  //   document.getElementById(tabId).classList.add('active-tab');
  //   window.scroll({
  //     top: activeTab.offsetTop,
  //     behavior: 'smooth'
  //   });
  // }
  
  // function toggleFavorite(icon) {
  //   // Toggle the 'favorited' class on the heart icon
  //   icon.classList.toggle('favorited');
  
  //   // Change the color of the heart icon
  //   var heartIcon = icon.querySelector('i.fa-heart');
  //   var recipeId = icon.getAttribute('data-recipe-id');
  //   if (icon.classList.contains('favorited')) {
  //     // If the recipe is favorited, make the heart red
  //     heartIcon.style.color = 'orange';
  //     showNotification('Recipe added to favorites!', 'success');
  //     // Get the recipe card container
  //     var recipeCard = icon.closest('.card');
  
  //     // Clone the recipe card
  //     var clonedCard = recipeCard.cloneNode(true);
  
  //     // Remove the heart icon from the cloned card
  //     var clonedHeartIcon = clonedCard.querySelector('.favorite-icon');
  //     if (clonedHeartIcon) {
  //       clonedHeartIcon.remove();
  //     }
  
  //     // Add a class to the cloned card based on the recipe ID
  //     clonedCard.classList.add('favorite-card-' + recipeId);
  
  //     // Add the cloned card to the "Favorites" tab
  //     var favoritesTab = document.getElementById('favorites-tab');
  //     favoritesTab.appendChild(clonedCard);
  //   } else {
  //     // If the recipe is not favorited, revert to the original color
  //     heartIcon.style.color = ''; // This will remove the inline style, letting the CSS handle it
  //     showNotification('Recipe removed from favorites!', 'danger');
  
  //     // Find and remove the cloned card from the "Favorites" tab
  //     var clonedCardToRemove = document.getElementById('favorites-tab').querySelector('.favorite-card-' + recipeId);
  //     if (clonedCardToRemove) {
  //       clonedCardToRemove.remove();
  //     }
  //   }
  // }
  
  // function showNotification(message, type) {
  //   // Create a Bootstrap alert
  //   var alertElement = document.createElement('div');
  //   alertElement.classList.add('alert', 'alert-' + type, 'alert-dismissible', 'fade', 'show', 'text-center'); // Add 'text-center'
  //   alertElement.innerHTML = `
  //       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  //           <span aria-hidden="true">&times;</span>
  //       </button>
  //       ${message}
  //   `;
  
  //   // Append the alert to the notification container
  //   var notificationContainer = document.getElementById('notification-container');
  //   notificationContainer.appendChild(alertElement);
  
  //   // Automatically close the alert after 3 seconds (adjust as needed)
  //   setTimeout(function() {
  //     alertElement.classList.remove('show');
  //     setTimeout(function() {
  //       alertElement.remove();
  //     }, 250);
  //   }, 3000);
  // }
  
  function searchByName() {
    // Get the search input value
    var searchInput = document.getElementById('searchInput').value.toLowerCase();
  
    // Get all recipe cards
    var recipeCards = document.querySelectorAll('.col-md-4');
  
    // Get the message element
    var noResultsMessage = document.getElementById('noResultsMessage');
  
    // Flag to check if any matching recipes are found
    var hasMatchingRecipes = false;
  
    // If there's a search input, loop through each card and check if the recipe name contains the search input
    if (searchInput !== '') {
      recipeCards.forEach(function(card) {
        var recipeName = card.querySelector('.card-title').textContent.toLowerCase();
        if (recipeName.includes(searchInput)) {
          card.style.display = 'block'; // Show the card
          hasMatchingRecipes = true;
        } else {
          card.style.display = 'none'; // Hide the card
        }
      });
    } else {
      // If no search input, show all cards
      recipeCards.forEach(function(card) {
        card.style.display = 'block';
      });
      hasMatchingRecipes = true; // Set to true since all recipes are considered matching
    }
  
    // Show or hide the message based on the search results
    noResultsMessage.style.display = hasMatchingRecipes ? 'none' : 'block';
  }
  
  
  function searchNormal() {
    // Add functionality for normal search (if needed)
    console.log('Normal search clicked');
  }
  
  function searchWithMic() {
    // Add functionality for search with microphone (if needed)
    console.log('Search with mic clicked');
  }
  
  // Run search on page load to hide the message initially
  document.addEventListener('DOMContentLoaded', function() {
    searchByName();
  });
 
  function toggleFavorite(element) {
    var recipeId = $(element).data('recipe-id');
    var isFavorite = $(element).data('favorite') === 1;
  
    $.ajax({
      url: 'toggleFavorite.php', // Adjust the URL to your server-side script
      type: 'POST',
      data: {
        recipeId: recipeId,
        isFavorite: !isFavorite,
      },
      success: function (response) {
        if (response === 'success') {
          $(element).data('favorite', !isFavorite);
          $(element).find('i').toggleClass('filled', !isFavorite);
        } else {
          console.error('Failed to toggle favorite status');
        }
      },
      error: function () {
        console.error('Failed to communicate with the server');
      }
    });
  }
  