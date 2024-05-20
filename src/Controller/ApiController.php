<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Partner;
use App\Repository\CompanyRepository;
use App\Repository\PartnerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    // listar todas as empresas
    #[Route('/api/companies', name: 'api_companies', methods: ['GET'])]
    public function getCompanies(CompanyRepository $companyRepository): Response
    {
        $listaCompanies = $companyRepository->findAll();

        return $this->json($listaCompanies, 200, [], ['groups' => 'api_list']);
    }

    // listar apenas uma empresa
    #[Route('/api/company/{company_id}', name: 'api_company', methods: ['GET'])]
    public function getCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->find($request->get('company_id'));
        return $this->json($company, 200, [], ['groups' => 'api_list']);
    }

    // listar todos os sócios de uma empresa
    #[Route('/api/company/{company_id}/partners', name: 'api_company_partners', methods: ['GET'])]
    public function getPartners(Request $request, CompanyRepository $companyRepository): Response
    {
        $company = $companyRepository->find($request->get('company_id'));
        $partner = $company->getPartners();
        // dd($partner);
        return $this->json($partner, 200, [], ['groups' => 'api_list']);
    }

    // listar apenas um sócio de uma empresa
    #[Route('/api/company/partner/{partner_id}', name: 'api_company_partner', methods: ['GET'])]
    public function getPartner(Request $request, PartnerRepository $partnerRepository): Response
    {
        $partner = $partnerRepository->find($request->get('partner_id'));
        return $this->json($partner, 200, [], ['groups' => 'api_list']);
    }

    // criar nova empresa
    #[Route('/api/company/create', name: 'api_company_create', methods: ['POST'])]
    public function createCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $data = $request->request->all();    
        $company = new Company();
        
        $company->setCorporateName($data['corporateName']);
        $company->setAddress($data['address']);
        $company->setCnpj($data['cnpj']);
        $company->setEmail($data['email']);
        $company->setPhone($data['phone']);

        $companyRepository->save($company);

        return $this->json($company);
    }

    // atualizar empresa
    #[Route('/api/company/{company_id}/update', name: 'api_company_update', methods: ['PUT'])]
    public function updateCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $data = $request->request->all();
        $companyId = $request->get('company_id');

        $company = $companyRepository->find($companyId);
        if (!$company) {
            return $this->json(['message' => 'Company not found'], 404);
        }

        $company->setCorporateName($data['corporateName']);
        $company->setAddress($data['address']);
        $company->setCnpj($data['cnpj']);
        $company->setEmail($data['email']);
        $company->setPhone($data['phone']);

        $companyRepository->save($company);

        return $this->json($company);
    }

    // deletar empresa
    #[Route('/api/company/{company_id}/delete', name: 'api_company_delete', methods: ['DELETE'])]
    public function deleteCompany(Request $request, CompanyRepository $companyRepository): Response
    {
        $companyId = $request->get('company_id');
        $company = $companyRepository->find($companyId);
        if (!$company) {
            return $this->json(['message' => 'Company not found'], 404);
        }

        $companyRepository->remove($company);
        return $this->json(null, 204);
    }

    // criar novo usuário
    #[Route('/api/company/{company_id}/partner/create', name: 'api_company_partner_create', methods: ['POST'])]
    public function createPartner(Request $request, PartnerRepository $partnerRepository, CompanyRepository $companyRepository): Response
    {
        $data = $request->request->all();
        // dd($data);
        $companyId = $request->get('company_id');
        $company = $companyRepository->find($companyId);
        if (!$company) {
            return $this->json(['message' => 'Company not found'], 404);
        }

        // dd($company);
        $partner = new Partner();
        $partner->setName($data['name']);
        $partner->setEmail($data['email']);
        $partner->setCpf($data['cpf']);
        $partner->setCompany($company);
        
        $partnerRepository->save($partner);
        return $this->json($partner, 200, [], ['groups' => 'api_list']);
    }

    // atualizar usuário
    #[Route('/api/company/{company_id}/partner/{partner_id}/update', name: 'api_company_partner_update', methods: ['PUT'])]
    public function updatePartner(Request $request, PartnerRepository $partnerRepository, CompanyRepository $companyRepository): Response
    {
        $data = $request->request->all();
        $partnerId = $request->get('partner_id');
        $companyId = $request->get('company_id');

        $company = $companyRepository->find($companyId);
        if (!$company) {
            return $this->json(['message' => 'Company not found'], 404);
        }

        $partner = $partnerRepository->find($partnerId);
        if (!$partner) {
            return $this->json(['message' => 'Partner not found'], 404);
        }

        $partner->setName($data['name']);
        $partner->setEmail($data['email']);
        $partner->setCpf($data['cpf']);
        $partner->setCompany($company);

        $partnerRepository->save($partner);
        return $this->json($partner, 200, [], ['groups' => 'api_list']);
    }

    // deletar usuário
    #[Route('/api/company/partner/{partner_id}/delete', name: 'api_company_partner_delete', methods: ['DELETE'])]
    public function deletePartner(Request $request, PartnerRepository $partnerRepository): Response
    {
        $partnerId = $request->get('partner_id');
        $partner = $partnerRepository->find($partnerId);
        if (!$partner) {
            return $this->json(['message' => 'Partner not found'], 404);
        }
        $partnerRepository->remove($partner);
        return $this->json(null, 204);
    }
}
