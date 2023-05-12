import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from 'react-router-dom';
import Header from './Header/Header';
import { Route, Routes } from 'react-router-dom';
import 'bootstrap/scss/bootstrap.scss';
import  'bootstrap/js/index.esm';
import 'bootstrap-icons/font/bootstrap-icons.css';
const App = () => {
    return (
        <div className='main container-fluid overflow-hidden'>
            <div className="row vh-100 overflow-auto">
                <Header />
                <div className="col content d-flex flex-column h-sm-100">
                    <main className="row overflow-auto">
                        <div className="col pt-4 vh-100">
                            <Routes>
                                <Route path='/' element={<h1 className='ve-100'>About Me</h1>}></Route>
                                <Route path='/blogs' element={<h1 className='ve-100'>Blog</h1>}></Route>
                                <Route path='/projects' element={<h1 className='ve-100'>Project</h1>}></Route>
                            </Routes>
                        </div>
                    </main>
                </div>
            </div>
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
