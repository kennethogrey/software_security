const express = require('express');
const childProcess = require('child_process');
const app = express();

app.get('/', (req, res) => {
    res.send(`
    <h1>File viewer</h1>
    <form method='GET' action='/view'>
      <input name='filename' />
      <input type='submit' value='Submit' />
    </form>
  `);
});

app.get('/view', (req, res) => {
    const { filename } = req.query;

    // Validate and sanitize the input
    if (!isValidFilename(filename)) {
        return res.status(400).send('Invalid filename');
    }

    const child = childProcess.spawnSync('cat', [filename]);
    if (child.status !== 0) {
        res.send(child.stderr.toString());
    } else {
        res.send(child.stdout.toString());
    }
});

function isValidFilename(filename) {
    // Implement your validation logic here
    // Example: check if the filename contains only alphanumeric characters
    return /^[a-zA-Z0-9]+$/.test(filename);
}

app.listen(4000, '127.0.0.1');