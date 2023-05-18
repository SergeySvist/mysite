import React from 'react';
import ReactDOM from "react-dom";
import {BrowserRouter} from "react-router-dom";

const App = () => {
    return (
        <div>
            <h1>Admin</h1>
        </div>
    );
}

const root = ReactDOM.createRoot(document.getElementById('root'));

root.render(
    <React.StrictMode>
        <BrowserRouter>
            <App />
        </BrowserRouter>
    </React.StrictMode>
);
