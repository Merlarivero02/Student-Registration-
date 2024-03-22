import { createBrowserRouter, RouterProvider } from "react-router-dom";
import './App.css'
import { HomePage, LoginPage } from "./views"

const router = createBrowserRouter([
  {
    path: "/",
    element: <HomePage />,
  },
  {
    path:"/login",
    element:<LoginPage/>
  }
]);

const App = () => {
  return <RouterProvider router={router} />;
};

export default App

