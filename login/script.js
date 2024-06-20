// server.js

import express from 'express';
import { createConnection } from 'mysql';
const app = express();

// Create a MySQL connection
const db = createConnection({
  host: 'localhost',
  user: 'root',
  password: '123',
  database: 'gitHublogin',
});

// Connect to the database
db.connect((err) => {
  if (err) {
    console.error('Error connecting to database:', err);
    return;
  }
  console.log('Connected to MySQL database');
});

// Handle form submission
app.post('/saveUser', (req, res) => {
  const { username, password } = req.body;

  // Insert user data into the 'users' table
  const sql = 'INSERT INTO users (username, password) VALUES (?, ?)';
  db.query(sql, [username, password], (err, result) => {
    if (err) {
      console.error('Error saving user:', err);
      res.status(500).send('Error saving user');
    } else {
      console.log('User saved successfully!');
      res.status(200).send('User saved successfully');
    }
  });
});

// Start the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
