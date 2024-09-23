# webapp_ballys
Overview:

You are tasked with developing a simple web application with a backend API and a frontend interface. The backend should expose an API to provide a list of player data, and the frontend should fetch and display this data in a table with sorting functionality.

You may use either Symfony or Spring Boot for the backend and Vue.js for the frontend. Additionally, you have flexibility in how you structure the project:

Integrated Approach: You can integrate Vue.js directly into your Symfony project using Symfony’s Webpack Encore. This allows you to manage both frontend and backend in a single project.
Separated Approach: Alternatively, you may create separate projects for the backend (Symfony or Spring Boot) and the frontend (Vue.js), allowing for a more decoupled architecture.
Both approaches are acceptable, so feel free to choose the one that best fits your workflow.

 

 

Backend (Symfony or Spring Boot):

Create an API endpoint that returns a list of 10 players in JSON format.
Each player should have the following fields: 
First Name
Last Name
City
Birth Date (in YYYY-MM-DD format)
The data can be static (no database required), but utilizing a MySql database is a plus.
 

Example of Json Response from API:
[

  {

    "first_name": "John",

    "last_name": "Doe",

    "city": "Gothenburg",

    "birth_date": "1995-08-12"

  },

  {

    "first_name": "Jane",

    "last_name": "Smith",

    "city": "Stockholm",

    "birth_date": "1992-11-05"

  },

  {

    "first_name": "Alice",

    "last_name": "Brown",

    "city": "Malmö",

    "birth_date": "1991-07-23"

  },

… and so on

]

 

 

Frontend (Vue.js):

Fetch the player data from the API you created.
Display the data in a table with the following columns: First Name, Last Name, City, Birth Date.
Add sorting functionality to the table: 
Allow sorting by Birth Date in ascending and descending order by clicking on arrow.
The design of the page should match the provided mockup (which is attached on this mail). Focus on making the page visually consistent with the design and it has to be fully responsive.
 

 

Mockup (design) details:

Background color of the page is linear-gradient(45deg,#4158d0,#c850c0).
Font family is OpenSans-Regular.
Font size is 15px
Font size for table head is 18px
Background color of the table head is #36304a
Arrow down icon is from Front Awesome and it’s called fa-arrow-down
 

 

Bonus (Optional):

Using a database to store the player data (instead of static JSON) is a plus.
Configure Docker for the project to simplify deployment and environment setup.
 

 

Submission:

Provide the source code for both the backend (Symfony or Spring Boot) and the frontend (Vue.js).
You can share the project with us either by providing a link to a Git repository (preferred) or by submitting it as a ZIP file.
If you choose the integrated approach, ensure Vue.js is correctly configured within the Symfony project.
Include instructions for running the project locally and any Docker configuration if implemented
 

 

Important Notes

Partial Submissions Are acceptable: We understand that completing the entire test may take time, so if you cannot finish the whole task, it is fine to submit what you have completed. 
Reach Out for Help: If you have any questions, need clarification, or require help with any part of the task, please don’t hesitate to reach out to valmir.abazi@ballys.com. We are here to support you throughout the process!