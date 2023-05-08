import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Menu from './Menu/Menu';
import { Route, Routes } from 'react-router-dom';

const App = () => {
    return (
        <div className='main'>
            <Menu />

            <Routes>
                <Route path='/' element={<h1>About Me</h1>}></Route>
                <Route path='/blogs' element={<h1>Blog</h1>}></Route>
                <Route path='/projects' element={<h1>Project</h1>}></Route>
            </Routes>
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
