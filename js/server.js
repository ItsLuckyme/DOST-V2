const mysql = require('mysql2');

// Database connection details
const connection = mysql.createConnection({
    host: 'localhost',       // Server name
    user: 'root',            // MySQL username
    password: 'Database#2024', // MySQL password
    database: 'institutions_database'       // Database name
});

// Connect to the database
connection.connect((err) => {
    if (err) {
        console.error('Connection failed: ' + err.message);
        return;
    }
    console.log('Connected successfully!');
});

// Example query
connection.query('SELECT * FROM users', (err, results) => {
    if (err) {
        console.error('Error executing query: ' + err.message);
        return;
    }
    console.log('Query results:', results);
});

// Close the connection
connection.end((err) => {
    if (err) {
        console.error('Error closing connection: ' + err.message);
        return;
    }
    console.log('Connection closed.');
});
