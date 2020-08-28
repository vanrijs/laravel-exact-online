<?php

namespace Websmurf\LaravelExactOnline;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Picqer\Financials\Exact\Connection;
use RuntimeException;

/**
 * @method \Picqer\Financials\Exact\AbsenceRegistration AbsenceRegistration()
 * @method \Picqer\Financials\Exact\AbsenceRegistrationTransaction AbsenceRegistrationTransaction()
 * @method \Picqer\Financials\Exact\AcceptQuotation AcceptQuotation()
 * @method \Picqer\Financials\Exact\Account Account()
 * @method \Picqer\Financials\Exact\AccountClass AccountClass()
 * @method \Picqer\Financials\Exact\AccountClassification AccountClassification()
 * @method \Picqer\Financials\Exact\AccountClassificationName AccountClassificationName()
 * @method \Picqer\Financials\Exact\AccountDocument AccountDocument()
 * @method \Picqer\Financials\Exact\AccountDocumentCount AccountDocumentCount()
 * @method \Picqer\Financials\Exact\AccountDocumentFolder AccountDocumentFolder()
 * @method \Picqer\Financials\Exact\AccountInvolvedAccount AccountInvolvedAccount()
 * @method \Picqer\Financials\Exact\AccountItem AccountItem()
 * @method \Picqer\Financials\Exact\AccountOwner AccountOwner()
 * @method \Picqer\Financials\Exact\AccountantInfo AccountantInfo()
 * @method \Picqer\Financials\Exact\ActiveEmployment ActiveEmployment()
 * @method \Picqer\Financials\Exact\Address Address()
 * @method \Picqer\Financials\Exact\AddressState AddressState()
 * @method \Picqer\Financials\Exact\AgingOverview AgingOverview()
 * @method \Picqer\Financials\Exact\AgingOverviewByAccount AgingOverviewByAccount()
 * @method \Picqer\Financials\Exact\AgingPayablesList AgingPayablesList()
 * @method \Picqer\Financials\Exact\AgingPayablesListByAgeGroup AgingPayablesListByAgeGroup()
 * @method \Picqer\Financials\Exact\AgingReceivablesList AgingReceivablesList()
 * @method \Picqer\Financials\Exact\AgingReceivablesListByAgeGroup AgingReceivablesListByAgeGroup()
 * @method \Picqer\Financials\Exact\AssemblyOrder AssemblyOrder()
 * @method \Picqer\Financials\Exact\Asset Asset()
 * @method \Picqer\Financials\Exact\AssetGroup AssetGroup()
 * @method \Picqer\Financials\Exact\AvailableFeature AvailableFeature()
 * @method \Picqer\Financials\Exact\Bank Bank()
 * @method \Picqer\Financials\Exact\BankAccount BankAccount()
 * @method \Picqer\Financials\Exact\BankEntry BankEntry()
 * @method \Picqer\Financials\Exact\BankEntryLine BankEntryLine()
 * @method \Picqer\Financials\Exact\BatchNumber BatchNumber()
 * @method \Picqer\Financials\Exact\BillOfMaterialMaterial BillOfMaterialMaterial()
 * @method \Picqer\Financials\Exact\BillOfMaterialVersion BillOfMaterialVersion()
 * @method \Picqer\Financials\Exact\Budget Budget()
 * @method \Picqer\Financials\Exact\BudgetScenario BudgetScenario()
 * @method \Picqer\Financials\Exact\BulkGLClassification BulkGLClassification()
 * @method \Picqer\Financials\Exact\ByProductReceipt ByProductReceipt()
 * @method \Picqer\Financials\Exact\ByProductReversal ByProductReversal()
 * @method \Picqer\Financials\Exact\CashEntry CashEntry()
 * @method \Picqer\Financials\Exact\CashEntryLine CashEntryLine()
 * @method \Picqer\Financials\Exact\CommunicationNote CommunicationNote()
 * @method \Picqer\Financials\Exact\Complaint Complaint()
 * @method \Picqer\Financials\Exact\Contact Contact()
 * @method \Picqer\Financials\Exact\CostEntryExpensesByProject CostEntryExpensesByProject()
 * @method \Picqer\Financials\Exact\CostEntryRecentAccount CostEntryRecentAccount()
 * @method \Picqer\Financials\Exact\CostEntryRecentAccountsByProject CostEntryRecentAccountsByProject()
 * @method \Picqer\Financials\Exact\CostEntryRecentCostType CostEntryRecentCostType()
 * @method \Picqer\Financials\Exact\CostEntryRecentCostTypesByProject CostEntryRecentCostTypesByProject()
 * @method \Picqer\Financials\Exact\CostEntryRecentExpensesByProject CostEntryRecentExpensesByProject()
 * @method \Picqer\Financials\Exact\CostEntryRecentProject CostEntryRecentProject()
 * @method \Picqer\Financials\Exact\CostTransaction CostTransaction()
 * @method \Picqer\Financials\Exact\CostType CostType()
 * @method \Picqer\Financials\Exact\CostTypesByDate CostTypesByDate()
 * @method \Picqer\Financials\Exact\CostTypesByProjectAndDate CostTypesByProjectAndDate()
 * @method \Picqer\Financials\Exact\Costcenter Costcenter()
 * @method \Picqer\Financials\Exact\CostsByDate CostsByDate()
 * @method \Picqer\Financials\Exact\CostsById CostsById()
 * @method \Picqer\Financials\Exact\Costunit Costunit()
 * @method \Picqer\Financials\Exact\Currency Currency()
 * @method \Picqer\Financials\Exact\CurrentYearAfterEntry CurrentYearAfterEntry()
 * @method \Picqer\Financials\Exact\CurrentYearProcessed CurrentYearProcessed()
 * @method \Picqer\Financials\Exact\DefaultAddressForAccount DefaultAddressForAccount()
 * @method \Picqer\Financials\Exact\DefaultMailbox DefaultMailbox()
 * @method \Picqer\Financials\Exact\Department Department()
 * @method \Picqer\Financials\Exact\DepreciationMethod DepreciationMethod()
 * @method \Picqer\Financials\Exact\DirectDebitMandate DirectDebitMandate()
 * @method \Picqer\Financials\Exact\Division Division()
 * @method \Picqer\Financials\Exact\DivisionClass DivisionClass()
 * @method \Picqer\Financials\Exact\DivisionClassName DivisionClassName()
 * @method \Picqer\Financials\Exact\DivisionClassValue DivisionClassValue()
 * @method \Picqer\Financials\Exact\Document Document()
 * @method \Picqer\Financials\Exact\DocumentAttachment DocumentAttachment()
 * @method \Picqer\Financials\Exact\DocumentCategorie DocumentCategorie()
 * @method \Picqer\Financials\Exact\DocumentCategory DocumentCategory()
 * @method \Picqer\Financials\Exact\DocumentFolder DocumentFolder()
 * @method \Picqer\Financials\Exact\DocumentType DocumentType()
 * @method \Picqer\Financials\Exact\DocumentTypeCategory DocumentTypeCategory()
 * @method \Picqer\Financials\Exact\DocumentTypeFolder DocumentTypeFolder()
 * @method \Picqer\Financials\Exact\DocumentsAttachment DocumentsAttachment()
 * @method \Picqer\Financials\Exact\Employee Employee()
 * @method \Picqer\Financials\Exact\Employment Employment()
 * @method \Picqer\Financials\Exact\EmploymentContract EmploymentContract()
 * @method \Picqer\Financials\Exact\EmploymentContractFlexPhase EmploymentContractFlexPhase()
 * @method \Picqer\Financials\Exact\EmploymentEndReason EmploymentEndReason()
 * @method \Picqer\Financials\Exact\EmploymentInternalRate EmploymentInternalRate()
 * @method \Picqer\Financials\Exact\EmploymentOrganization EmploymentOrganization()
 * @method \Picqer\Financials\Exact\EmploymentSalary EmploymentSalary()
 * @method \Picqer\Financials\Exact\ExchangeRate ExchangeRate()
 * @method \Picqer\Financials\Exact\FinancialPeriod FinancialPeriod()
 * @method \Picqer\Financials\Exact\GLAccount GLAccount()
 * @method \Picqer\Financials\Exact\GLAccountClassificationMapping GLAccountClassificationMapping()
 * @method \Picqer\Financials\Exact\GLClassification GLClassification()
 * @method \Picqer\Financials\Exact\GLScheme GLScheme()
 * @method \Picqer\Financials\Exact\GLTransactionSource GLTransactionSource()
 * @method \Picqer\Financials\Exact\GLTransactionType GLTransactionType()
 * @method \Picqer\Financials\Exact\GeneralJournalEntry GeneralJournalEntry()
 * @method \Picqer\Financials\Exact\GeneralJournalEntryLine GeneralJournalEntryLine()
 * @method \Picqer\Financials\Exact\GetMostRecentlyUsedDivision GetMostRecentlyUsedDivision()
 * @method \Picqer\Financials\Exact\GoodsDelivery GoodsDelivery()
 * @method \Picqer\Financials\Exact\GoodsDeliveryLine GoodsDeliveryLine()
 * @method \Picqer\Financials\Exact\GoodsReceipt GoodsReceipt()
 * @method \Picqer\Financials\Exact\GoodsReceiptLine GoodsReceiptLine()
 * @method \Picqer\Financials\Exact\HostingOpportunity HostingOpportunity()
 * @method \Picqer\Financials\Exact\HourCostType HourCostType()
 * @method \Picqer\Financials\Exact\HourEntryActivitiesByProject HourEntryActivitiesByProject()
 * @method \Picqer\Financials\Exact\HourEntryRecentAccount HourEntryRecentAccount()
 * @method \Picqer\Financials\Exact\HourEntryRecentAccountsByProject HourEntryRecentAccountsByProject()
 * @method \Picqer\Financials\Exact\HourEntryRecentActivitiesByProject HourEntryRecentActivitiesByProject()
 * @method \Picqer\Financials\Exact\HourEntryRecentHourType HourEntryRecentHourType()
 * @method \Picqer\Financials\Exact\HourEntryRecentHourTypesByProject HourEntryRecentHourTypesByProject()
 * @method \Picqer\Financials\Exact\HourEntryRecentProject HourEntryRecentProject()
 * @method \Picqer\Financials\Exact\HourType HourType()
 * @method \Picqer\Financials\Exact\HourTypesByDate HourTypesByDate()
 * @method \Picqer\Financials\Exact\HourTypesByProjectAndDate HourTypesByProjectAndDate()
 * @method \Picqer\Financials\Exact\HoursByDate HoursByDate()
 * @method \Picqer\Financials\Exact\HoursById HoursById()
 * @method \Picqer\Financials\Exact\ImportNotification ImportNotification()
 * @method \Picqer\Financials\Exact\ImportNotificationDetail ImportNotificationDetail()
 * @method \Picqer\Financials\Exact\InvoiceSalesOrder InvoiceSalesOrder()
 * @method \Picqer\Financials\Exact\InvoiceTerm InvoiceTerm()
 * @method \Picqer\Financials\Exact\InvolvedUser InvolvedUser()
 * @method \Picqer\Financials\Exact\InvolvedUserRole InvolvedUserRole()
 * @method \Picqer\Financials\Exact\Item Item()
 * @method \Picqer\Financials\Exact\ItemAssortment ItemAssortment()
 * @method \Picqer\Financials\Exact\ItemAssortmentProperty ItemAssortmentProperty()
 * @method \Picqer\Financials\Exact\ItemDetailsByID ItemDetailsByID()
 * @method \Picqer\Financials\Exact\ItemExtraField ItemExtraField()
 * @method \Picqer\Financials\Exact\ItemGroup ItemGroup()
 * @method \Picqer\Financials\Exact\ItemVersion ItemVersion()
 * @method \Picqer\Financials\Exact\ItemWarehouse ItemWarehouse()
 * @method \Picqer\Financials\Exact\ItemWarehousePlanningDetail ItemWarehousePlanningDetail()
 * @method \Picqer\Financials\Exact\ItemWarehousePlanningDetails ItemWarehousePlanningDetails()
 * @method \Picqer\Financials\Exact\ItemWarehouseStorageLocation ItemWarehouseStorageLocation()
 * @method \Picqer\Financials\Exact\JobGroup JobGroup()
 * @method \Picqer\Financials\Exact\JobTitle JobTitle()
 * @method \Picqer\Financials\Exact\Journal Journal()
 * @method \Picqer\Financials\Exact\JournalStatusByFinancialPeriod JournalStatusByFinancialPeriod()
 * @method \Picqer\Financials\Exact\JournalStatusList JournalStatusList()
 * @method \Picqer\Financials\Exact\Layout Layout()
 * @method \Picqer\Financials\Exact\LeaveBuildUpRegistration LeaveBuildUpRegistration()
 * @method \Picqer\Financials\Exact\LeaveRegistration LeaveRegistration()
 * @method \Picqer\Financials\Exact\MailMessage MailMessage()
 * @method \Picqer\Financials\Exact\MailMessageAttachment MailMessageAttachment()
 * @method \Picqer\Financials\Exact\MailMessagesSent MailMessagesSent()
 * @method \Picqer\Financials\Exact\Mailbox Mailbox()
 * @method \Picqer\Financials\Exact\ManufacturingSetting ManufacturingSetting()
 * @method \Picqer\Financials\Exact\MaterialIssue MaterialIssue()
 * @method \Picqer\Financials\Exact\MaterialReversal MaterialReversal()
 * @method \Picqer\Financials\Exact\Me Me()
 * @method \Picqer\Financials\Exact\OfficialReturn OfficialReturn()
 * @method \Picqer\Financials\Exact\Operation Operation()
 * @method \Picqer\Financials\Exact\OperationResource OperationResource()
 * @method \Picqer\Financials\Exact\Opportunity Opportunity()
 * @method \Picqer\Financials\Exact\OpportunityContact OpportunityContact()
 * @method \Picqer\Financials\Exact\OpportunityDocuments OpportunityDocuments()
 * @method \Picqer\Financials\Exact\OpportunityDocumentsCount OpportunityDocumentsCount()
 * @method \Picqer\Financials\Exact\OutstandingInvoicesOverview OutstandingInvoicesOverview()
 * @method \Picqer\Financials\Exact\PayablesList PayablesList()
 * @method \Picqer\Financials\Exact\PayablesListByAccount PayablesListByAccount()
 * @method \Picqer\Financials\Exact\PayablesListByAccountAndAgeGroup PayablesListByAccountAndAgeGroup()
 * @method \Picqer\Financials\Exact\PayablesListByAgeGroup PayablesListByAgeGroup()
 * @method \Picqer\Financials\Exact\Payment Payment()
 * @method \Picqer\Financials\Exact\PaymentCondition PaymentCondition()
 * @method \Picqer\Financials\Exact\PlannedSalesReturnLine PlannedSalesReturnLine()
 * @method \Picqer\Financials\Exact\PreferredMailbox PreferredMailbox()
 * @method \Picqer\Financials\Exact\PreferredMailboxForOperation PreferredMailboxForOperation()
 * @method \Picqer\Financials\Exact\PreviousYearAfterEntry PreviousYearAfterEntry()
 * @method \Picqer\Financials\Exact\PreviousYearProcessed PreviousYearProcessed()
 * @method \Picqer\Financials\Exact\PriceList PriceList()
 * @method \Picqer\Financials\Exact\PrintQuotation PrintQuotation()
 * @method \Picqer\Financials\Exact\PrintedSalesInvoice PrintedSalesInvoice()
 * @method \Picqer\Financials\Exact\PrintedSalesOrder PrintedSalesOrder()
 * @method \Picqer\Financials\Exact\ProcessPayment ProcessPayment()
 * @method \Picqer\Financials\Exact\ProcessStockCount ProcessStockCount()
 * @method \Picqer\Financials\Exact\ProcessWarehouseTransfer ProcessWarehouseTransfer()
 * @method \Picqer\Financials\Exact\ProductionArea ProductionArea()
 * @method \Picqer\Financials\Exact\ProfitLossOverview ProfitLossOverview()
 * @method \Picqer\Financials\Exact\Project Project()
 * @method \Picqer\Financials\Exact\ProjectBudgetType ProjectBudgetType()
 * @method \Picqer\Financials\Exact\ProjectHourBudget ProjectHourBudget()
 * @method \Picqer\Financials\Exact\ProjectPlanning ProjectPlanning()
 * @method \Picqer\Financials\Exact\ProjectPlanningRecurring ProjectPlanningRecurring()
 * @method \Picqer\Financials\Exact\ProjectRestrictionEmployee ProjectRestrictionEmployee()
 * @method \Picqer\Financials\Exact\ProjectRestrictionItem ProjectRestrictionItem()
 * @method \Picqer\Financials\Exact\ProjectRestrictionRebilling ProjectRestrictionRebilling()
 * @method \Picqer\Financials\Exact\ProjectWBSByProject ProjectWBSByProject()
 * @method \Picqer\Financials\Exact\ProjectWBSByProjectAndWBS ProjectWBSByProjectAndWBS()
 * @method \Picqer\Financials\Exact\PurchaseEntry PurchaseEntry()
 * @method \Picqer\Financials\Exact\PurchaseEntryLine PurchaseEntryLine()
 * @method \Picqer\Financials\Exact\PurchaseInvoice PurchaseInvoice()
 * @method \Picqer\Financials\Exact\PurchaseInvoiceLine PurchaseInvoiceLine()
 * @method \Picqer\Financials\Exact\PurchaseOrder PurchaseOrder()
 * @method \Picqer\Financials\Exact\PurchaseOrderLine PurchaseOrderLine()
 * @method \Picqer\Financials\Exact\Quotation Quotation()
 * @method \Picqer\Financials\Exact\QuotationLine QuotationLine()
 * @method \Picqer\Financials\Exact\ReasonCode ReasonCode()
 * @method \Picqer\Financials\Exact\Receivable Receivable()
 * @method \Picqer\Financials\Exact\ReceivablesList ReceivablesList()
 * @method \Picqer\Financials\Exact\ReceivablesListByAccount ReceivablesListByAccount()
 * @method \Picqer\Financials\Exact\ReceivablesListByAccountAndAgeGroup ReceivablesListByAccountAndAgeGroup()
 * @method \Picqer\Financials\Exact\ReceivablesListByAgeGroup ReceivablesListByAgeGroup()
 * @method \Picqer\Financials\Exact\RecentCost RecentCost()
 * @method \Picqer\Financials\Exact\RecentCostsByNumberOfWeeks RecentCostsByNumberOfWeeks()
 * @method \Picqer\Financials\Exact\RecentHour RecentHour()
 * @method \Picqer\Financials\Exact\RecentTimeTransaction RecentTimeTransaction()
 * @method \Picqer\Financials\Exact\RejectQuotation RejectQuotation()
 * @method \Picqer\Financials\Exact\ReopenQuotation ReopenQuotation()
 * @method \Picqer\Financials\Exact\ReportingBalance ReportingBalance()
 * @method \Picqer\Financials\Exact\Returns Returns()
 * @method \Picqer\Financials\Exact\RevenueList RevenueList()
 * @method \Picqer\Financials\Exact\RevenueListByYear RevenueListByYear()
 * @method \Picqer\Financials\Exact\RevenueListByYearAndStatus RevenueListByYearAndStatus()
 * @method \Picqer\Financials\Exact\ReviewQuotation ReviewQuotation()
 * @method \Picqer\Financials\Exact\SalesEntry SalesEntry()
 * @method \Picqer\Financials\Exact\SalesEntryLine SalesEntryLine()
 * @method \Picqer\Financials\Exact\SalesInvoice SalesInvoice()
 * @method \Picqer\Financials\Exact\SalesInvoiceLine SalesInvoiceLine()
 * @method \Picqer\Financials\Exact\SalesItemPrice SalesItemPrice()
 * @method \Picqer\Financials\Exact\SalesOrder SalesOrder()
 * @method \Picqer\Financials\Exact\SalesOrderID SalesOrderID()
 * @method \Picqer\Financials\Exact\SalesOrderLine SalesOrderLine()
 * @method \Picqer\Financials\Exact\SalesPriceListDetail SalesPriceListDetail()
 * @method \Picqer\Financials\Exact\SalesShippingMethods SalesShippingMethods()
 * @method \Picqer\Financials\Exact\Schedule Schedule()
 * @method \Picqer\Financials\Exact\SerialNumber SerialNumber()
 * @method \Picqer\Financials\Exact\ShippingMethod ShippingMethod()
 * @method \Picqer\Financials\Exact\ShopOrder ShopOrder()
 * @method \Picqer\Financials\Exact\ShopOrderMaterialPlan ShopOrderMaterialPlan()
 * @method \Picqer\Financials\Exact\ShopOrderMaterialPlanDetail ShopOrderMaterialPlanDetail()
 * @method \Picqer\Financials\Exact\ShopOrderPriority ShopOrderPriority()
 * @method \Picqer\Financials\Exact\ShopOrderReceipt ShopOrderReceipt()
 * @method \Picqer\Financials\Exact\ShopOrderReversal ShopOrderReversal()
 * @method \Picqer\Financials\Exact\ShopOrderRoutingStepPlan ShopOrderRoutingStepPlan()
 * @method \Picqer\Financials\Exact\ShopOrderRoutingStepPlansAvailableToWork ShopOrderRoutingStepPlansAvailableToWork()
 * @method \Picqer\Financials\Exact\SolutionLink SolutionLink()
 * @method \Picqer\Financials\Exact\StageForDeliveryReceipt StageForDeliveryReceipt()
 * @method \Picqer\Financials\Exact\StageForDeliveryReversal StageForDeliveryReversal()
 * @method \Picqer\Financials\Exact\StartedTimedTimeTransaction StartedTimedTimeTransaction()
 * @method \Picqer\Financials\Exact\StockBatchNumber StockBatchNumber()
 * @method \Picqer\Financials\Exact\StockCount StockCount()
 * @method \Picqer\Financials\Exact\StockCountLine StockCountLine()
 * @method \Picqer\Financials\Exact\StockPosition StockPosition()
 * @method \Picqer\Financials\Exact\StockSerialNumber StockSerialNumber()
 * @method \Picqer\Financials\Exact\StorageLocation StorageLocation()
 * @method \Picqer\Financials\Exact\SubOrderReversal SubOrderReversal()
 * @method \Picqer\Financials\Exact\Subscription Subscription()
 * @method \Picqer\Financials\Exact\SubscriptionLine SubscriptionLine()
 * @method \Picqer\Financials\Exact\SubscriptionReasonCode SubscriptionReasonCode()
 * @method \Picqer\Financials\Exact\SubscriptionRestrictionEmployee SubscriptionRestrictionEmployee()
 * @method \Picqer\Financials\Exact\SubscriptionRestrictionItem SubscriptionRestrictionItem()
 * @method \Picqer\Financials\Exact\SubscriptionType SubscriptionType()
 * @method \Picqer\Financials\Exact\SupplierItem SupplierItem()
 * @method \Picqer\Financials\Exact\SystemDivision SystemDivision()
 * @method \Picqer\Financials\Exact\Task Task()
 * @method \Picqer\Financials\Exact\TaskType TaskType()
 * @method \Picqer\Financials\Exact\TaxEmploymentEndFlexCode TaxEmploymentEndFlexCode()
 * @method \Picqer\Financials\Exact\TimeAndBillingAccountDetail TimeAndBillingAccountDetail()
 * @method \Picqer\Financials\Exact\TimeAndBillingAccountDetailsByID TimeAndBillingAccountDetailsByID()
 * @method \Picqer\Financials\Exact\TimeAndBillingActivitiesAndExpense TimeAndBillingActivitiesAndExpense()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryAccount TimeAndBillingEntryAccount()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryAccountsByDate TimeAndBillingEntryAccountsByDate()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryAccountsByProjectAndDate TimeAndBillingEntryAccountsByProjectAndDate()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryProject TimeAndBillingEntryProject()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryProjectsByAccountAndDate TimeAndBillingEntryProjectsByAccountAndDate()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryProjectsByDate TimeAndBillingEntryProjectsByDate()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryRecentAccount TimeAndBillingEntryRecentAccount()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryRecentActivitiesAndExpense TimeAndBillingEntryRecentActivitiesAndExpense()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryRecentHourCostType TimeAndBillingEntryRecentHourCostType()
 * @method \Picqer\Financials\Exact\TimeAndBillingEntryRecentProject TimeAndBillingEntryRecentProject()
 * @method \Picqer\Financials\Exact\TimeAndBillingItemDetail TimeAndBillingItemDetail()
 * @method \Picqer\Financials\Exact\TimeAndBillingItemDetailsByID TimeAndBillingItemDetailsByID()
 * @method \Picqer\Financials\Exact\TimeAndBillingProjectDetail TimeAndBillingProjectDetail()
 * @method \Picqer\Financials\Exact\TimeAndBillingProjectDetailsByID TimeAndBillingProjectDetailsByID()
 * @method \Picqer\Financials\Exact\TimeAndBillingRecentProject TimeAndBillingRecentProject()
 * @method \Picqer\Financials\Exact\TimeCorrection TimeCorrection()
 * @method \Picqer\Financials\Exact\TimeTransaction TimeTransaction()
 * @method \Picqer\Financials\Exact\TimedTimeTransaction TimedTimeTransaction()
 * @method \Picqer\Financials\Exact\Transaction Transaction()
 * @method \Picqer\Financials\Exact\TransactionLine TransactionLine()
 * @method \Picqer\Financials\Exact\Unit Unit()
 * @method \Picqer\Financials\Exact\Units Units()
 * @method \Picqer\Financials\Exact\User User()
 * @method \Picqer\Financials\Exact\UserHasRights UserHasRights()
 * @method \Picqer\Financials\Exact\UserRole UserRole()
 * @method \Picqer\Financials\Exact\UserRolesPerDivision UserRolesPerDivision()
 * @method \Picqer\Financials\Exact\VatCode VatCode()
 * @method \Picqer\Financials\Exact\VatPercentage VatPercentage()
 * @method \Picqer\Financials\Exact\Warehouse Warehouse()
 * @method \Picqer\Financials\Exact\WarehouseTransfer WarehouseTransfer()
 * @method \Picqer\Financials\Exact\WarehouseTransferLine WarehouseTransferLine()
 * @method \Picqer\Financials\Exact\WebhookSubscription WebhookSubscription()
 * @method \Picqer\Financials\Exact\Workcenter Workcenter()
 * @method self connectionSetBaseUrl(string $baseUrl)
 * @method self setApiUrl(string $apiUrl)
 * @method self setAuthUrl(string $authUrl)
 * @method self setTokenUrl(string $tokenUrl)
 *
 * Class LaravelExactOnline
 *
 * @package Websmurf\LaravelExactOnline
 */
class LaravelExactOnline
{
    private $connection;

    /**
     * LaravelExactOnline constructor.
     */
    public function __construct()
    {
        $this->connection = app()->make('Exact\Connection');
    }

    /**
     * Magically calls methods from Picqer Exact Online API
     *
     * @param string $method Name of the method that's called.
     * @param array $arguments Arguments passed to it.
     * 
     * @return mixed
     * 
     * @throws RuntimeException Throws a RuntimeException when the provided method does not exist.
     */
    public function __call($method, $arguments)
    {
        if(strpos($method, "connection") === 0) {
            $method = lcfirst(substr($method, 10));

            call_user_func([$this->connection, $method], implode(",", $arguments));

            return $this;

        }

        $classname = "\\Picqer\\Financials\\Exact\\" . $method;

        if(class_exists($classname) === false) {
            throw new RuntimeException("Invalid type called");
        }

        return new $classname($this->connection);
    }

    /**
     * Function to handle the token update call from picqer.
     *
     * @param Connection $connection Connection instance.
     */
    public static function tokenUpdateCallback (Connection $connection) {
        $config = self::loadConfig();

        $config->exact_accessToken = serialize($connection->getAccessToken());
        $config->exact_refreshToken = $connection->getRefreshToken();
        $config->exact_tokenExpires = $connection->getTokenExpires();

        self::storeConfig($config);
    }

    /**
     * Load existing configuration.
     *
     * @return Authenticatable|object
     */
    public static function loadConfig()
    {
        if(config('laravel-exact-online.exact_multi_user')) {
            return Auth::user();
        }

        $config = '{}';

        if (Storage::exists('exact.api.json')) {
            $config = Storage::get(
                'exact.api.json'
            );
        }

        return (object) json_decode($config, false);
    }

    /**
     * Store configuration changes.
     *
     * @param Authenticatable|object $config
     */
    public static function storeConfig($config)
    {
        if(config('laravel-exact-online.exact_multi_user')) {
            $config->save();
            return;
        }

        Storage::put('exact.api.json', json_encode($config));
    }
}
