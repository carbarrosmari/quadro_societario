<?php

namespace App\Controller;

use App\Entity\Company;
use App\Form\CompanyType;
use App\Form\EditCompanyType;
use App\Repository\CompanyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class CompanyContoller extends AbstractController
{
    #[Route('/companies', name: 'companies')]
    // #[IsGranted('ROLE_USER')]
    public function getCompanies(CompanyRepository $companyRepository): Response
    {
        $data['companies'] = $companyRepository->findAll();
        $data['title'] = 'Gerenciar Empresas';

        return $this->render('company/companies.html.twig', $data);
    }

    #[Route('/company/create', name: 'company_create')]
    // #[IsGranted('ROLE_USER')]
    public function createCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $msg = '';
        $company = new Company();
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyRepository->save($company);
            $msg = 'Company created successfully!';
        }

        $data['title'] = 'Cardastrar empresa';
        $data['form'] = $form;
        $data['msg'] = $msg;
        return $this->render('company/create.html.twig', $data);
    }

    #[Route('/company/{company_id}/update', name: 'company_update')]
    // #[IsGranted('ROLE_USER')]
    public function updateCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $msg = '';
        $company = $companyRepository->find($request->get('company_id'));
        $form = $this->createForm(EditCompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $companyRepository->save($company);
            $msg = 'Company updated successfully!';
        }

        $data['title'] = 'Editar empresa';
        $data['companyId'] = $company->getId();
        $data['form'] = $form;
        $data['msg'] = $msg;
        return $this->render('company/update.html.twig', $data);
    }

    #[Route('/company/{company_id}/delete', name: 'company_delete')]
    // #[IsGranted('ROLE_USER')]
    public function deleteCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->find($request->get('company_id'));
        $companyRepository->remove($company);
        return $this->redirectToRoute('companies');
    }
}